<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WrkActasRetencion */

$this->title = 'Update Wrk Actas Retencion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Wrk Actas Retencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_acta_retencion, 'url' => ['view', 'id' => $model->id_acta_retencion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wrk-actas-retencion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
