<?php

namespace app\controllers;

use Yii;
use app\models\EntOficiales;
use app\models\EntOficialesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\ModUsuarios\models\Utils;
use app\models\Calendario;
use app\models\ResponseServices;
use app\components\AccessControlExtend;

/**
 * OficialesController implements the CRUD actions for EntOficiales model.
 */
class OficialesController extends Controller
{
   /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControlExtend::className(),
                'only' => ['bloquear-oficial','activar-oficial','delete','update','create','view','index'],//colocar aqui todos los action que se encuentran en este controller
                'rules' => [
                    [
                        'actions' => ['bloquear-oficial','activar-oficial','delete','update','create','view','index'],
                        'allow' => true,
                        'roles' => ['admin','oficial','super-admin','TEA'],
                    ],
                   
                ],
            ],
      ];
    }

    /**
     * Lists all EntOficiales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntOficialesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntOficiales model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EntOficiales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EntOficiales();
        $model->uddi = Utils::generateToken();
        $model->fch_creacion = Calendario::getFechaActual();
        $model->txt_rol='oficial';
        $model->b_habilitado=1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EntOficiales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_oficial]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EntOficiales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntOficiales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntOficiales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EntOficiales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionActivarOficial($uddi = null){
        $response = new ResponseServices();
        $oficial = $this->findModel(['uddi'=>$uddi]);
        if($oficial)
        {
            $oficial->b_habilitado=EntOficiales::STATUS_ACTIVED;
            if($oficial->save())
            {
                $response->status='success';
                $response->message='Oficial activado';
            }
            else
            {
                $response->status='success';
                $response->message='No se pudo activar el oficial';
                $response->result=$oficial->errors;
            }
        }
        return $response;
    }

    public function actionBloquearOficial($uddi = null){
        $response = new ResponseServices();
        $oficial = $this->findModel(['uddi'=>$uddi]);
        if($oficial)
        {
            $oficial->b_habilitado=EntOficiales::STATUS_BLOCKED;
            if($oficial->save())
            {
                $response->status='success';
                $response->message='Oficial desactivado';
            }
            else
            {
                $response->status='success';
                $response->message='No se pudo desactivar al oficial';
                $response->result=$oficial->errors;
            }
        }
    }
}
