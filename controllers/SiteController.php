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
                "autoMarginPadding"=>0,
               
                "setAutoBottomMargin"=>"stretch",
                
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
            
            'SetFooter'=>['<table cellpadding="0" cellspacing="0" style="border:1px solid black;border-top:none;border-bottom-color:black;width:100%;">
                                <tr>
                                    <td style="padding:12px 8px;">
                                        <strong style="display:block;">Cadena original. Información del documento oficial que presenta que declara:</strong>
                                        <span style="display:block;font-size:11px;">
                                        folio=1BIH3I158JE3VF15|fecha=2018/07/18 16:53|oficina=AICM TERMINAL 2, CDMX|tipoDentificacion=INE|numeroIdentificacion=hd|nombre=Faf|apellidoPaterno=Dafw|apellidoMaterno=C|nacionalidad=Mexicano|correoElectronico=ahdja|estado=Aguascalientes|municipio=Naucalpan|calle=HDM|numero=Hfk|tipoActa=Zoosanitaria|paisOrigen=Afganistán|paisProcedencia=Afganistán|tipoMercancia=Animales vivos|cantidad=5586|unidadMedida=Kilogramo|descripcionHechos=hd|detectadoPor=Policia federal preventiva|dictamen=Acondicionamiento|nombreVerificadorTFA=ALFREDO RAMÍREZ SERRANO|claveVerificadorTFA=TEA|nombreCompletoOficial=ALFREDO RAMÍREZ SERRANO
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 8px;">
                                        <strong style="display: block;">Sello digital del autorizador del documento oficial:</strong>
                                        <span style="display: block; font-size: 11px;">LMzlEfeqflT5ZqOHjDaxQehOKcqai1/IjBvFtX1oYAahW6MfYx+PKwsPvda+y3R6UimLMZ0pREDcZBB0w+Yg0nVw8GCBzzuQ9nVCYO2W16Cb8yTlvMpbOSXYxqoKxd2mLOW5DLp++J6u/r0d2oYH7d/tOeVfRoJnAWgnymvNq9YdY8uD1BQPmuKqOWfbJwJ Qb72gIuxDZk+U6HfsMpaPfSt+Hayv1IW7zA56sVi/sV2QXO6BJh8t9f08qGmHRWJif8WGaxy/oqVoUR6z4BxawYmyaLSRF2V7BKuDkhEDJpnNWpFQGwnxidPT0xvrLXbrko7TuYAr2MF9tQA0UwuJ1w==</span>
                                    </td>
                                </tr>
                            </table>'],
            ],
        ]);
    
        // return the pdf output as per the destination setting
        return $pdf->render();

    }

    
    
}
