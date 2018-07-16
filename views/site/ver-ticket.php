<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WrkActasRetencion */

$this->title = "Acta";
$this->params['classBody'] = "site-navbar-small actas-retencion-view";
?>

<h2 class="title-gral"><?= Html::encode($this->title) ?></h2>

<div class="cont-view">

    <p><span>Oficial:</span> <?=$model->oficial->nombreCompleto?></p>
    <p><span>Folio:</span> <?=$model->txt_folio?></p>
    <p><span>Fecha:</span> <?=$model->txt_fecha?></p>
    <p><span>Oficina:</span> <?=$model->txt_oficina?></p>
    <p><span>Tipo de identificación:</span> <?=$model->txt_tipo_identificacion?></p>
    <p><span>Número de identificación:</span> <?=$model->txt_numero_identificacion?></p>

    <hr>

    <p><span>Nombre:</span> <?=$model->txt_nombre?></p>
    <p><span>Apellidos:</span> <?=$model->txt_apellido_paterno?> <?=$model->txt_apellido_materno?></p>
    <p><span>Nacionalidad:</span> <?=$model->txt_nacionalidad?></p>
    <p><span>Correo:</span> <?=$model->txt_correo?></p>
    <p><span>Dirección:</span> <?=$model->txt_calle?>, <?=$model->txt_numero?>, <?=$model->txt_municipio?>, <?=$model->txt_estado?></p>

    <hr>

    <p><span>Tipo de acta:</span> <?=$model->txt_tipo_acta?></p>
    <p><span>País de origen:</span> <?=$model->txt_pais_origen?></p>
    <p><span>País de procedencia:</span> <?=$model->txt_pais_procedencia?></p>
    <p><span>Tipo de mercancia:</span> <?=$model->txt_tipo_mercancia?></p>
    <p><span>Cantidad:</span> <?=$model->txt_cantidad?></p>
    <p><span>Unidad de medida:</span> <?=$model->txt_unidad_medida?></p>
    <p><span>Descripción o Hechos:</span> <?=$model->txt_descripcion_hechos?></p>

    <hr>

    <p><span>Detectado por:</span> <?=$model->txt_detectado_por?></p>
