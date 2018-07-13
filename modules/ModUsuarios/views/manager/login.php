<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['classBody'] = "layout-full login-page";

?>



<div class="panel">
	<div class="panel-body">
		
		<h2>
            <img src="<?=Url::base()?>/webAssets/images/logo-latingal-boutique.png" alt="">
        </h2>


		<?php 
	$form = ActiveForm::begin([
		'id' => 'form-ajax',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
		'options'=>[
			"class"=>"form-login",
		],
	]);
	?>

		<?= $form->field($model, 'username')->textInput(["class" => "form-control"]) ?>

		<?= $form->field($model, 'password')->passwordInput(["class" => "form-control"]) ?>

		<div class="form-group olvide-contrasena">
			<a class="login-link" href="<?= Url::base() ?>/peticion-pass"></a>
		</div>

		<div class="form-group form-group-actions">
			<?= Html::submitButton('<span class="ladda-label">Ingresar</span>', ["data-style" => "zoom-in", 'class' => 'btn btn-primary btn-block btn-lg mt-20 ladda-button', 'name' => 'login-button']); ?>
		</div>

		<div class="form-group necesito-cuenta">
			<a class="login-link" href="<?= Url::base() ?>/sign-up"></a>
		</div>

		<?php ActiveForm::end(); ?>


		<div class="ayuda-soporte">
			<span></span>
			<a class="no-redirect login-link" href="mailto:soporte@2gom.com.mx?Subject=Solicitud%de%Soporte"></a>
		</div>
	</div>
</div>
