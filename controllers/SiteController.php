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
use app\models\EntEfirmas;

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

        $firma = EntEfirmas::find()->where(["id_acta_retencion"=>$acta->id_acta_retencion])->one();

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_acta', ["acta"=>$acta]);
        
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_DOWNLOAD, 
            'filename'=>$folio.".pdf",
            'content' => $content,  
            'marginLeft'=>5,
            'marginRight'=>5,
            'options'=>[
                "setAutoTopMargin"=>'stretch',
                "setAutoBottomMargin"=>'stretch',
                "autoMarginPadding"=>0,
               
                
                
            ],

            'cssInline' => ' body{
                font-family: Arial, "Helvetica";
                font-size: 14px;
            }
            table{
                border-spacing: 0;
                margin: 0;
                width: 100%;
            }
            table tr td,
            table tr th{
                font-size: 12px;
            }', 
            // set mPDF properties on the fly
            //'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
        
            'methods' => [ 
            'SetHeader'=>['<table cellpadding="0" cellspacing="0" style="border-left: 1px solid black; border-top: 1px solid black; border-right: 1px solid black; border-bottom: none; border-collapse: collapse; margin: 0; width: 100%;">
            <tr>
                <td align="left" style="padding: 8px 12px;">
                    <img src="https://dev.2geeksonemonkey.com/senasica/admin/web/webAssets/images/logo-sagarpa-horizontal.png" width="140" alt="Sagarpa">
                </td>
                <td align="right" style="padding: 8px 12px;">
                    <img src="https://dev.2geeksonemonkey.com/senasica/admin/web/webAssets/images/logo-senasica-horizontal.png" width="130" alt="Senasica">
                </td>
            </tr>

            <tr>
                <td align="center" colspan="2" style="padding: 24px 0;">
                    <h1 style="font-size: 13px; font-style: italic; font-weight: bold; margin-bottom: 8px; margin-top: 0; text-transform: uppercase;">Secretaría de Agricultura, Ganadería, Desarrollo Rural, Pesca y Alimentación</h1>
                    <h2 style="font-size: 13px; font-weight: bold; margin-bottom: 8px; margin-top: 0; text-transform: uppercase;">Servicio Nacional de Sanidad inocuidad y Calidad Agroalimentaria</h2>
                    <h3 style="font-size: 13px; font-weight: bold; margin-top: 0; text-transform: uppercase;">Dirección General de inspección Fitozoosanitaria</h3>
                </td>
            </tr>

        </table>'], 
            
            'SetFooter'=>['<div style="text-align: left; width: 100%;"><strong style="font-size: 7px; font-style: normal;">Cadena original. Información del documento oficial que presenta que declara:</strong><br><p style="font-size: 6px; font-style: normal; font-weight: 300;">'.$firma->txt_cadena_original.'</p>
                                       
            <br><strong style="font-size: 7px; font-style: normal;">Sello digital del autorizador del documento oficial:</strong><br><p style="font-size: 6px; font-style: normal; font-weight: 300;">'.$firma->txt_certificado.'</p></div>'],
            ],
        ]);
    
        // return the pdf output as per the destination setting
        return $pdf->render();

    }

    
    
}
