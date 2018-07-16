<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\EntOficiales;
use app\models\CatTiposIdentificacion;
use app\models\CatDetectadosPor;
use app\models\CatDictamen;
use app\models\CatEstados;
use app\models\CatTiposActas;
use app\models\CatTiposMercancias;
use app\models\CatPaises;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\WrkActasRetencionSearch */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Exportar Reportes';
$this->params['classBody'] = "site-navbar-small reportes-create";

$oficiales = EntOficiales::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$identificaciones = CatTiposIdentificacion::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$detectados = CatDetectadosPor::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$dictamenes = CatDictamen::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$estados = CatEstados::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$tiposActas = CatTiposActas::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$mercancias = CatTiposMercancias::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$paises = CatPaises::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
?>


<h2 class="title-gral"><?= Html::encode($this->title) ?></h2>

<div class="cont-create">


    <?php $form = ActiveForm::begin([
        'action' => ['//reportes/exportar'],
        'method' => 'get',
        'options'=>[
            "target"=>"_blank"
        ]
    ]); ?>

        <div class="row">

            <div class="col-md-12">
                <?php
                // Usage with model and Active Form (with no default initial value)
                echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'startDate',
                'attribute2' => 'endDate',
                'options' => ['placeholder' => 'Fecha inicio', "id"=>"new"],
                'options2' => ['placeholder' => 'Fecha final', "id"=>"new2"],

                'type' => DatePicker::TYPE_RANGE,
                'form' => $form,
                'separator' => '<i class="icon  fa-arrows-h"></i>',

                'pluginOptions' => [
                'format' => 'dd-mm-yyyy',
                'autoclose' => true,

                'maxViewMode'=>2
                ],
                ]);

                ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'id_oficial')
                ->widget(Select2::classname(), [
                'data' => ArrayHelper::map($oficiales, 'id_oficial', 'nombreCompleto'),
                'language' => 'es',
                'options' => ['placeholder' => 'Seleccionar oficial'],
                'pluginOptions' => [
                'allowClear' => true
                ],
                ]);
                ?>
            </div>

            <!-- <div class="col-md-4">
                <?php //= $form->field($model, 'txt_folio') ?>
            </div> -->

            <!-- <div class="col-md-4">
                <?php //= $form->field($model, 'txt_fecha')->widget(DatePicker::classname(), [
                //'options' => ['placeholder' => 'Enter birth date ...'],
                // 'type' => DatePicker::TYPE_INPUT,
                // 'pluginOptions' => [
                // 'autoclose'=>true,
                // 'format' => 'dd-mm-yyyy'
                // ]
                // ]);?>
            </div> -->

            <div class="col-md-4">
                <?=$form->field($model, 'txt_oficina') ?>
            </div>

            <!-- <div class="col-md-4">

                <?php // = $form->field($model, 'txt_tipo_identificacion')
                // ->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map($identificaciones, 'txt_nombre', 'txt_nombre'),
                // 'language' => 'es',
                // 'options' => ['placeholder' => 'Seleccionar tipo de identificación'],
                // 'pluginOptions' => [
                // 'allowClear' => true
                // ],
                // ]);
                ?>
            </div> -->

            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_numero_identificacion') ?>
            </div> -->

            <!-- <div class="col-md-4">
                <?//=$form->field($model, 'txt_nombre') ?>
            </div> -->

            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_apellido_paterno') ?>
            </div> -->

            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_apellido_materno') ?>
            </div> -->

            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_nacionalidad') ?>
            </div>

            <div class="col-md-4">
                <? //=$form->field($model, 'txt_correo') ?>
            </div> -->

            <!-- <div class="col-md-4">
                <? //= $form->field($model, 'txt_estado')
                // ->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map($estados, 'id_estado', 'txt_nombre'),
                // 'language' => 'es',
                // 'options' => ['placeholder' => 'Seleccionar un estado'],
                // 'pluginOptions' => [
                // 'allowClear' => true
                // ],
                // ]);
                ?> 
            </div>-->

            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_municipio') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'txt_calle') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'txt_numero') ?>
            </div> -->
            
            <div class="col-md-4">
                <?= $form->field($model, 'txt_tipo_acta')
                ->widget(Select2::classname(), [
                'data' => ArrayHelper::map($tiposActas, 'txt_nombre', 'txt_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => 'Seleccionar tipo de acta'],
                'pluginOptions' => [
                'allowClear' => true
                ],
                ]);
                ?>
            </div>
            
            <!-- <div class="col-md-4">
                <? //= $form->field($model, 'txt_pais_origen')
                // ->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map($paises, 'txt_nombre', 'txt_nombre'),
                // 'language' => 'es',
                // 'options' => ['placeholder' => 'Seleccionar país'],
                // 'pluginOptions' => [
                // 'allowClear' => true
                // ],
                // ]);
                ?>
            </div>-->
            
            <!-- <div class="col-md-4">
                <? //= $form->field($model, 'txt_pais_procedencia')
                // ->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map($paises, 'txt_nombre', 'txt_nombre'),
                // 'language' => 'es',
                // 'options' => ['placeholder' => 'Seleccionar país'],
                // 'pluginOptions' => [
                // 'allowClear' => true
                // ],
                // ]);
                ?>
            </div>  -->
            
            <!-- <div class="col-md-4">
                <? //= $form->field($model, 'txt_tipo_mercancia')
                // ->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map($mercancias, 'txt_nombre', 'txt_nombre'),
                // 'language' => 'es',
                // 'options' => ['placeholder' => 'Seleccionar tipo de mercancia'],
                // 'pluginOptions' => [
                // 'allowClear' => true
                // ],
                // ]);
                ?>
            </div> -->
            
            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_cantidad') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'txt_unidad_medida') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'txt_descripcion_hechos') ?>
            </div>
             -->
            <!-- <div class="col-md-4">
                <? //= $form->field($model, 'txt_detectado_por')
                // ->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map($detectados, 'txt_nombre', 'txt_nombre'),
                // 'language' => 'es',
                // 'options' => ['placeholder' => 'Detectado por'],
                // 'pluginOptions' => [
                // 'allowClear' => true
                // ],
                // ]);
                ?>
            </div> -->
            
            <div class="col-md-4">
                <?= $form->field($model, 'txt_dictamen')
                ->widget(Select2::classname(), [
                'data' => ArrayHelper::map($dictamenes, 'txt_nombre', 'txt_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => 'Dictamen'],
                'pluginOptions' => [
                'allowClear' => true
                ],
                ]);
                ?>
            </div>
            
            <!-- <div class="col-md-4">
                <? //=$form->field($model, 'txt_nombre_verificador_tea') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'txt_clave_verificador_tea') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'txt_nombre_completo_oficial') ?>
            </div>
            
            <div class="col-md-4">
                <? //=$form->field($model, 'data') ?>
            </div> -->
            
            <div class="col-md-12">
                <div class="form-group text-right">
                <?= Html::resetButton('Restablecer', ['class' => 'btn btn-default']) ?>
                <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

        </div>

    <?php ActiveForm::end(); ?>

</div>
