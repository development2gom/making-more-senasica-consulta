<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\WrkActasRetencion;
use app\models\WrkActasRetencionSearch;
use app\components\AccessControlExtend;


class ReportesController extends Controller{
/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControlExtend::className(),
                'only' => ['exportar','index'],
                'rules' => [
                    [
                        'actions' => ['exportar','index'],
                        'allow' => true,
                        'roles' => ['admin','oficial','super-admin','TEA'],
                    ],
                   
                ],
            ],
            
        ];
    }
    public function actionIndex(){
        $searchModel = new WrkActasRetencionSearch();
        
        return $this->render("index", ["searchModel"=>$searchModel]);
    }

    public function actionExportar(){

        $fileName = "Reporte.csv";

        $searchModel = new WrkActasRetencionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $data = [];
        $data[0] = $this->setHeaders();
        
        foreach($dataProvider->getModels() as $model){
            $oficial = $model->oficial;
            $data[$model->id_acta_retencion] = [
                $oficial->nombreCompleto,
                $model->txt_folio,
                $model->txt_fecha,
                $model->txt_oficina,
                $model->txt_tipo_identificacion,
                $model->txt_numero_identificacion,
                $model->txt_nombre,
                $model->txt_apellido_paterno,
                $model->txt_apellido_materno,
                $model->txt_nacionalidad,
                $model->txt_correo,
                $model->txt_estado,
                $model->txt_municipio,
                $model->txt_calle,
                $model->txt_numero,
                $model->txt_tipo_acta,
                $model->txt_pais_origen,
                $model->txt_pais_procedencia,
                $model->txt_tipo_mercancia,
                $model->txt_cantidad,
                $model->txt_unidad_medida,
                $model->txt_descripcion_hechos,
                $model->txt_detectado_por,
                $model->txt_dictamen,
                $model->txt_nombre_verificador_tea,
                $model->txt_clave_verificador_tea
            ];


        }

        header('Content-Type: application/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
    
            //Open up a PHP output stream using the function fopen.
        $fp = fopen('php://output', 'w');
        //add BOM to fix UTF-8 in Excel
        fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        
            //Loop through the array containing our CSV data.
        foreach ($data as $row) {
            //fputcsv formats the array into a CSV format.
            //It then writes the result to our output stream.
            fputcsv($fp, $row);
        }
    
            //Close the file handle.
        fclose($fp);
        exit;
    }

    public function setHeaders(){
        return["Oficial", "Folio", "Fecha", "Oficina", "Tipo identificacion", 
            "Número identificación", "Nombre", "Apellido paterno", "Apellido materno", 
            "Nacionalidad", "Correo", "Estado", "Municipio", "Calle", "Numero", "Tipo acta", 
            "País origen", "País procedencia", "Tipo mercancia", "Cantidad", "Unidad medida", 
            "Descripción hechos", "Detectado por", "Dictamen", "Nombre verificador tea", "Clave verificador tea"];
    }
}