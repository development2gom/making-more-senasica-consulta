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
use kartik\mpdf\Pdf;
use Mpdf\Mpdf;

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

    public function actionDownload2(){
        $mpdf = new Mpdf();
        $mpdf->setAutoTopMargin= "stretch";
            
        $mpdf->autoMarginPadding = "0";
        $mpdf->autoPageBreak = true;
        $mpdf->SetHTMLFooter("hola", "E");
        $mpdf->marginFooter = 0;
       
        $mpdf->WriteHTML($this->renderPartial('_acta'));
        $mpdf->Output();
        exit;
    }

    public function actionDownload(){

        // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('_acta');
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        'options'=>[
            "setAutoTopMargin"=>"stretch",
            
            "autoMarginPadding"=>0,
            'autoPageBreak'=>true,
            
            "SetHTMLFooter"=>["hola", "E"],
            "marginFooter"=>0
            
            //"setAutoBottomMargin"=>true
        ],
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
       // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => ' body{
            font-family: Arial, "Helvetica";
            font-size: 14px;
        }
        table{
            border-spacing: 0;
            width: 100%;
        }', 
         // set mPDF properties on the fly
        //'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
         
        'methods' => [ 
          'SetHeader'=>['<table cellpadding="0" cellspacing="0" style="border-left: 1px solid black; border-top: 1px solid black; border-right: 1px solid black; border-bottom: none; border-collapse: collapse; width: 100%;">
          <tr>
              <td align="left" style="padding: 8px 12px;">
                  <img src="https://dev.2geeksonemonkey.com/senasica/admin/web/webAssets/images/logo-sagarpa-horizontal.png" width="224" alt="Sagarpa">
              </td>
              <td align="right" style="padding: 8px 12px;">
                  <img src="https://dev.2geeksonemonkey.com/senasica/admin/web/webAssets/images/logo-senasica-horizontal.png" width="160" alt="Senasica">
              </td>
          </tr>

          <tr>
              <td align="center" colspan="2" style="padding: 24px 0;">
                  <h1 style="font-size: 18px; font-style: italic; font-weight: bold; margin-bottom: 4px; margin-top: 0; text-transform: uppercase;">Secretaría de Agricultura, Ganadería, Desarrollo Rural, Pesca y Alimentación</h1>
                  <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 4px; margin-top: 0; text-transform: uppercase;">Servicio Nacional de Sanidad inocuidad y Calidad Agroalimentaria</h2>
                  <h3 style="font-size: 18px; font-weight: bold; margin-top: 0; text-transform: uppercase;">Dirección General de inspección Fitozoosanitaria</h3>
              </td>
          </tr>

      </table>'], 
         
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render();
    }

    
}
