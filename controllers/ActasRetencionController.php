<?php

namespace app\controllers;

use Yii;
use app\models\WrkActasRetencion;
use app\models\WrkActasRetencionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AccessControlExtend;

/**
 * ActasRetencionController implements the CRUD actions for WrkActasRetencion model.
 */
class ActasRetencionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControlExtend::className(),
                'only' => ['delete','update','Create','index','view'],
                'rules' => [
                    [
                        'actions' => ['delete','update','create','index','view'],
                        'allow' => true,
                        'roles' => ['admin','oficial','super-admin','TEA'],
                    ],
                   
                ],
            ],
            
        ];
    }

    /**
     * Lists all WrkActasRetencion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WrkActasRetencionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WrkActasRetencion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($token)
    {
        return $this->render('view', [
            'model' => $this->findModel($token),
        ]);
    }

    public function actionVerTicket($token){

        $this->layout = "@app/views/layouts/classic/topBar/mainBlank";

        return $this->render('ver-ticket', [
            'model' => $this->findModel($token),
        ]);
    }

    /**
     * Creates a new WrkActasRetencion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WrkActasRetencion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acta_retencion]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WrkActasRetencion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acta_retencion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WrkActasRetencion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WrkActasRetencion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WrkActasRetencion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WrkActasRetencion::find()->where(["txt_folio"=>$id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
