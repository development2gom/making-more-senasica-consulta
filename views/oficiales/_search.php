<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntOficialesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-oficiales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php// $form->field($model, 'id_oficial') ?>

    <?php // $form->field($model, 'uddi') ?>

    <?php  echo $form->field($model, 'txt_nombre') ?>

    <?php  echo $form->field($model, 'txt_apellido_paterno') ?>

    <?php  echo $form->field($model, 'txt_apellido_materno') ?>

    <?= $form->field($model, 'txt_nombre_usuario') ?>

    <?= $form->field($model, 'txt_contrasena') ?>

    <?= $form->field($model, 'fch_creacion') ?>

    <?php  echo $form->field($model, 'txt_oisa') ?>

    

    <?= $form->field($model, 'txt_rol') ?>

    <?php  echo $form->field($model, 'txt_clave_tea') ?>

    <?php  echo $form->field($model, 'txt_curp') ?>

    <?php  echo $form->field($model, 'txt_rfc') ?>

    <?php  echo $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
