<?php

use yii\helpers\Html;
use yii\web\View;
use app\modules\ModUsuarios\models\EntUsuarios;
use app\models\ConstantesWeb;


/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */

$usuario = EntUsuarios::getUsuarioLogueado();

// $this->title = 'Usuario '.$model->nombreCompleto;
// $this->params['breadcrumbs'][] = [
//     'label' => '<i class="icon pe-users"></i> Usuarios', 
//     'encode' => false,
//     'template'=>'<li class="breadcrumb-item">{link}</li>',
//     'url' => ['index'], 
//   ];
// $this->params['breadcrumbs'][] = [
//     'label' => '<i class="icon wb-plus"></i>'.$this->title, 
//     'encode' => false,
//     'template'=>'<li class="breadcrumb-item">{link}</li>', 
//   ];
$this->title = 'Editar usuario';
$this->params['classBody'] = "site-navbar-small site-menubar-hide usuarios-create";

$this->registerJsFile(
  '@web/webAssets/js/sign-up.js',
  ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerCssFile(
  '@web/webAssets/css/signUp.css',
  ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<h2 class="title-gral"><?= Html::encode($this->title) ?></h2>

<div class="cont-create">

    <?= $this->render('_form', [
        'model' => $model,
        'roles'=>$roles,
        
    ]) ?>

</div>
<?php
if ($model->txt_auth_item == ConstantesWeb::SUPERVISOR) {
  echo $this->render("_view-usuarios-asignados", ['model' => $model, 'roles' => $roles]);
}
?>

<?php
$this->registerJs(
  '
  var claseOcultar = "hidden-xl-down";
  $("#entusuarios-txt_auth_item").on("change", function(){
    var val = $(this).val();
    var contenedor = $(".asignar-supervisor-contenedor");
    if(val=="' . ConstantesWeb::CALLCENTER . '"){
      contenedor.removeClass(claseOcultar);
    }else{
      contenedor.addClass(claseOcultar);
    }

  });
  ',
  View::POS_END,
  'tipo-usuario'
);
?>