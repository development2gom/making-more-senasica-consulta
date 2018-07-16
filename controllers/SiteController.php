<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\components\AccessControlExtend;
use app\models\WrkActasRetencion;
use yii\web\HttpException;

class SiteController extends Controller
{
   
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex($folio = null){

        $acta = WrkActasRetencion::find()->where(["txt_folio"=>$folio])->one();

        if(!$acta){
            throw new HttpException(404, "No se encontro el acta");
        }

        $this->layout = "@app/views/layouts/classic/topBar/mainBlank";

        return $this->render('ver-ticket', [
            'model' => $acta,
        ]);

    }

    
}
