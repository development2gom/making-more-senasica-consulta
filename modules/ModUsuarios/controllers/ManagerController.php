<?php

namespace app\modules\ModUsuarios\controllers;

use Yii;
use yii\web\Controller;
use app\modules\ModUsuarios\models\EntUsuarios;
use app\modules\ModUsuarios\models\LoginForm;
use vendor\facebook\FacebookI;
use app\modules\ModUsuarios\models\Utils;
use app\modules\ModUsuarios\models\EntUsuariosActivacion;
use app\modules\ModUsuarios\models\EntUsuariosCambioPass;
use app\modules\ModUsuarios\models\EntUsuariosFacebook;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;
use app\config\FireBase;

/**
 * Default controller for the `musuarios` module
 */
class ManagerController extends Controller {

	/**
     * @inheritdoc
     */
     public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::className(),
                 'only' => ['profile'],
                 'rules' => [
                     [
                         'actions' => ['profile'],
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                   
                 ],
             ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

	public $layout = "@app/views/layouts/classic/topBar/mainBlank";
	
	/**
	 * Registrar usuario en la base de datos
	 */
	public function actionSignUp() {
		
		$model = new EntUsuarios ( [ 
				'scenario' => 'registerInput' 
		] );

		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
		
		if ($model->load ( Yii::$app->request->post () )) {
			
			if ($model->signup ()) {

				// Envia un correo de bienvenida al usuario
				if(Yii::$app->params ['modUsuarios'] ['mandarCorreoBienvenida']){
					$model->enviarEmailBienvenida();
				}
				
				if (Yii::$app->params ['modUsuarios'] ['mandarCorreoActivacion']) {
					
					$model->enviarEmailActivacion();
					
					$this->redirect ( [ 
							'login' 
					] );
					
				} else {
					
					if (Yii::$app->getUser ()->login ( $model )) {
						return $this->goHome ();
					}
				}
			}
			
			// return $this->redirect(['view', 'id' => $model->id_usuario]);
		}

		if(FireBase::ENABLED){
			// return $this->render ( '//firebase/sign-up', [ 
			// 	'model' => $model 
			// ] );
		}else{
			
		}
		return $this->render ( 'signUp', [ 
			'model' => $model 
		] );
		
	}
	
	/**
	 * Crea peticion para el cambio de contraseña
	 */
	public function actionPeticionPass() {
		$model = new LoginForm ();
		$model->scenario = 'recovery';
		if ($model->load ( Yii::$app->request->post () ) && $model->validate ()) {
			
			$peticionPass = new EntUsuariosCambioPass ();
			
			$peticionPass->saveUsuarioPeticion ( $model->userEncontrado->id_usuario );
			$user = $peticionPass->idUsuario;
			
			// Enviar correo de activación
			$utils = new Utils ();
			// Parametros para el email
			$parametrosEmail ['url'] = Yii::$app->urlManager->createAbsoluteUrl ( [ 
					'cambiar-pass/' . $peticionPass->txt_token 
			] );
			$parametrosEmail ['user'] = $user->getNombreCompleto ();
			
			// Envio de correo electronico
			$utils->sendEmailRecuperarPassword ($user->txt_email, $parametrosEmail );

			Yii::$app->session->setFlash('success', "Se ha mandado un correo electrónico a: ".$user->txt_email." con instrucciones para recuperar su contraseña");
		}
		return $this->render ( 'peticionPass', [ 
				'model' => $model 
		] );
	}

	/**
	 * Ingresa automaticamente al portal
	 */
	public function actionIngresar($t=null){
		$usuario = EntUsuarios::find()->where(["txt_token"=>$t])->one();

		if($usuario && $usuario->id_status == EntUsuarios::STATUS_BLOCKED){
			// Mandar 

			return false;
		}

		if($usuario){
			Yii::$app->getUser ()->login ( $usuario );
			$usuario->id_status = EntUsuarios::STATUS_ACTIVED;
			$usuario->save();
		}

		

		return $this->goHome();
	}
	
	/**
	 * Cambia la contraseña del usuario
	 *
	 * @param string $t        	
	 */
	public function actionCambiarPass($t = null) {
		$peticion = $this->findPeticionByToken ( $t );
		if (empty ( $peticion )) {
			/**
			 *
			 * @todo Poner mensaje de que la peticion ha expirado
			 */
			return $this->redirect ( [ 
					'peticion-pass' 
			] );
		}
		
		$model = new EntUsuarios ();
		$model->scenario = 'cambiarPass';
		
		// Si los campos estan correctos por POST
		if ($model->load ( Yii::$app->request->post () )) {
			$user = $peticion->idUsuario;
			$user->setPassword ( $model->password );
			$user->save ();
			
			$peticion->updateUsuarioPeticion ();
			
			return $this->redirect ( [ 
					'login' 
			] );
		}
		
		return $this->render ( 'cambiarPass', [ 
				'model' => $model 
		] );
	}
	
	/**
	 * Activa la cuenta del usuario
	 *
	 * @param string $t        	
	 */
	public function actionActivarCuenta($t = null) {
		$activacion = $this->findActivacionByToken ( $t );
		
		$usuario = $activacion->idUsuario;
		
		if ($usuario->id_status == EntUsuarios::STATUS_ACTIVED) {
			return $this->goHome ();
		}
		
		$usuario->activarUsuario ();
		$activacion->actualizaActivacion ();
		
		if (Yii::$app->getUser ()->login ( $usuario )) {
			return $this->goHome ();
		}
	}
	
	/**
	 * Loguea al usuario
	 */
	public function actionLogin() {

		if (! Yii::$app->user->isGuest) {
			return $this->goHome ();
		}

		$model = new LoginForm ();
		$model->scenario = 'login';

		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}

		if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
			
			return $this->goBack ();
		}
		return $this->render ( 'login', [ 
				'model' => $model 
		] );
	}

	public function actionProfile(){
		$this->layout = "@app/views/layouts/main";
		$usuario = Yii::$app->user->identity;

		return $this->redirect(["//site/construccion"]);

		return $this->render('profile', ['model'=>$usuario]);
	}
	
	/**
	 * Callback para facebook
	 */
	public function actionCallbackFacebook() {
		$fb = new FacebookI ();
		
		// Obtenemos la respuesta de facebook
		$data = $fb->recoveryDataUserJavaScript ();
		
		// Si no existe la informacion enviada de facebook
		if (gettype ( $data ) == "string") {
			if ($data == "error" || empty ( $data )) {
				$this->redirect ( [ 
						'site/login' 
				] );
			}
		}
		
		// asi podemos obtener sus datos de los amigos
		// foreach($data['friendsInApp'] as $key=>$value){
		// 	$value->id;
		// 	$value->name;
		// }
		
		// Buscamos al usuario por email
		$existUsuario = EntUsuarios::findByEmail ( $data ['profile'] ['email'] );
		
		// Si no existe creamos su cuenta
		if (! $existUsuario) {
			$entUsuario = new EntUsuarios ();
			$entUsuario->addDataFromFaceBook ( $data );
			
			$existUsuario = $entUsuario->signup (true);
		}
		
		// Buscamos si existe la cuenta de facebook en la base de datos
		$existUsuarioFacebook = EntUsuariosFacebook::getUsuarioFaceBookByIdFacebook ( $data ['profile'] ['id'] );
		
		// Si no existe
		if (! $existUsuarioFacebook) {
			$existUsuarioFacebook = new EntUsuariosFacebook ();
		}
		$existUsuarioFacebook->id_usuario = $existUsuario->id_usuario;
		$usuarioGuardado = $existUsuarioFacebook->saveDataFacebook ( $data );
		
		if (Yii::$app->getUser ()->login ( $existUsuario )) {
			return $this->goHome ();
		}
	}
	public function actionTest() {
		$utils = new Utils ();
		$utils->sendEmailActivacion ();
	}
	
	/**
	 * Busca la peticion de cambio de contraseña por el token
	 * Si no se encuentra, un 404 HTTP exception sera arrojada.
	 *
	 * @param string $t        	
	 * @return EntUsuariosCambioPass
	 */
	protected function findPeticionByToken($t = null) {
		if (($model = EntUsuariosCambioPass::getPeticionByToken ( $t )) !== null) {
			
			return $model;
		}
	}
	
	/**
	 * Busca la activacion por el token
	 * Si no se encuentra, un 404 HTTP exception sera arrojada.
	 *
	 * @param string $t        	
	 * @return EntUsuariosActivacion
	 * @throws NotFoundHttpException
	 */
	protected function findActivacionByToken($t = null) {
		if (($model = EntUsuariosActivacion::getActivacionByToken ( $t )) !== null) {
			
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	/**
	 * Busca al usuario
	 * Si no se encuentra, un 404 HTTP exception sera arrojada.
	 *
	 * @param string $t        	
	 * @return EntUsuarios
	 * @throws NotFoundHttpException
	 */
	protected function findUsuarioById($id = null) {
		if (($model = EntUsuarios::findIdentity ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
}
