<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\View;
use app\models\ConstantesWeb;
use app\modules\ModUsuarios\models\EntUsuarios;
use app\models\AuthItem;
use app\models\CatAreas;
use app\models\CatOisas;

$areas = CatAreas::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();
$oisas = CatOisas::find()->where(["b_habilitado"=>1])->orderBy("txt_nombre")->all();

?>

<?php $form = ActiveForm::begin([
    'id' => 'form-guardar-usuario',
            //'options' => ['class' => 'form-horizontal'],
            //'enableAjaxValidation' => true,
    'enableClientValidation' => true,
]); ?>

<div class="row">
    <!-- <div class="col-md-4">
        <div class="user-file">
            <a class="user-file-a js-img-avatar">
                <img class="js-image-preview" src="<?= Url::base() . "/webAssets/images/site/user.png" ?>">
            </a>
        </div> 
    </div>-->
    <div class="col-md-12">

        <?php $form->field($model, 'image')->fileInput(["class" => "hidden-xxl-down"])->label(false) ?> 

        <h5>Datos Generales</h5>
        <div class="row">
            <div class="col-md-6">

                <?= $form->field($model, 'txt_auth_item')
                    ->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($roles, 'name', 'description'),
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccionar tipo de usuario'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false);
                ?> 
            </div>
            <?php

            $usuario = Yii::$app->user->identity;
            ?>

        </div>
        
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'txt_username')->textInput(['maxlength' => true, 'placeholder' => 'Nombre'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'txt_apellido_paterno')->textInput(['maxlength' => true, 'placeholder' => 'Apellido paterno'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'txt_apellido_materno')->textInput(['maxlength' => true, 'placeholder' => 'Apellido materno'])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'txt_clave_tea')->textInput(['maxlength' => true, 'placeholder' => 'Clave TEA'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'txt_curp')->textInput(['maxlength' => true, 'placeholder' => 'CURP'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => true, 'placeholder' => 'RFC'])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'txt_conmutador')->textInput(['maxlength' => true, 'placeholder' => 'Conmutador'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'txt_extension_numero_local')->textInput(['maxlength' => true, 'placeholder' => 'Extensión o Número local'])->label(false) ?>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-6">
                
                <?= $form->field($model, 'id_area')
                    ->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($areas, 'id_area', 'txt_nombre'),
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccionar area'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false);
                ?> 
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'id_oisa')
                    ->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($oisas, 'id_oisas', 'txt_nombre'),
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccionar oisa'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false);?>
            </div>
        </div>
        
        <h5>Datos de Usuario</h5>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'txt_email')->textInput(['maxlength' => true, 'placeholder' => 'Usuario'])->label(false) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'password')
                ->textInput(['placeholder' => 'Contraseña'])
                ->label(false)
                
                    ?>
            </div>
        </div>         

        <div class="row">
            <div class="col-md-12">
                <div class="form-group text-right">
                    <?= Html::submitButton('<span class="ladda-label"><i class="icon wb-plus"></i> Guardar usuario</span>', ['class' => "btn btn-primary ladda-button btn-usuarios-add", "data-style" => "zoom-in", "id" => "btn-guardar-usuario"]) ?>
                </div>
            </div>
        </div>

        
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php
 $this->registerJs(
    '
    $(document).ready(function(){
        $("#entusuarios-txt_auth_item").on("change", function(){

        });
       
    });
    
    ',
    View::POS_END,
    'aprobar-cita'
    );