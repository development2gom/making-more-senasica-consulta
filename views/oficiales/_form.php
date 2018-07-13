<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\CatOisas;

/* @var $this yii\web\View */
/* @var $model app\models\EntOficiales */
/* @var $form yii\widgets\ActiveForm */
$oisas = CatOisas::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
?>

<div class="ent-oficiales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'uddi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_nombre_usuario')->textInput(['maxlength' => true, 'placeholder' => 'Usuario'])->label(false) ?>

   <?php // 'placeholder' => 'Apellido paterno'])->label(false) ?>

    <?= $form->field($model, 'txt_contrasena')->textInput(['maxlength' => true,'placeholder' => 'Contraseña'])->label(false) ?>

    <?php // $form->field($model, 'fch_creacion')->textInput() ?>

    <?= $form->field($model, 'txt_oisa')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($oisas, 'txt_nombre', 'txt_nombre'),
                        'language' => 'es','options' => ['placeholder' => 'Seleccionar oisa'],
                        'pluginOptions' => ['allowClear' => true],])->label(false);?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre'])->label(false) ?>

    <?= $form->field($model, 'txt_apellido_paterno')->textInput(['maxlength' => true, 'placeholder' => 'Apellido paterno'])->label(false) ?>

    <?= $form->field($model, 'txt_apellido_materno')->textInput(['maxlength' => true, 'placeholder' => 'Apellido materno'])->label(false) ?>

    <?php // $form->field($model, 'txt_rol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_clave_tea')->textInput(['maxlength' => true, 'placeholder' => 'Clave Tea'])->label(false) ?>

    <?= $form->field($model, 'txt_curp')->textInput(['maxlength' => true, 'placeholder' => 'Curp'])->label(false) ?>

    <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => true, 'placeholder' => 'Rfc'])->label(false) ?>

    <?php  $form->field($model, 'b_habilitado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar oficial', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
