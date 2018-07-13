<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WrkActasRetencion */

$this->title = "Acta";
$this->params['breadcrumbs'][] = ['label' => 'Wrk Actas Retencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrk-actas-retencion-view">
    <?=$model->id_oficial?>
    <?=$model->txt_folio?>
    <?=$model->txt_fecha?>
    <?=$model->txt_oficina?>
    <?=$model->txt_tipo_identificacion?>
    <?=$model->txt_numero_identificacion?>
    <?=$model->txt_nombre?>
    <?=$model->txt_apellido_paterno?>
    <?=$model->txt_apellido_materno?>
    <?=$model->txt_nacionalidad?>
    <?=$model->txt_correo?>
    <?=$model->txt_estado?>
    <?=$model->txt_municipio?>
    <?=$model->txt_calle?>
    <?=$model->txt_numero?>
    <?=$model->txt_tipo_acta?>
    <?=$model->txt_pais_origen?>
    <?=$model->txt_pais_procedencia?>
    <?=$model->txt_tipo_mercancia?>
    <?=$model->txt_cantidad?>
    <?=$model->txt_unidad_medida?>
    <?=$model->txt_descripcion_hechos?>
    <?=$model->txt_detectado_por?>
    <?=$model->txt_dictamen?>
    <?=$model->txt_nombre_verificador_tea?>
    <?=$model->txt_clave_verificador_tea?>
    <?=$model->txt_nombre_completo_oficial?>
    <?=$model->data?>


</div>
