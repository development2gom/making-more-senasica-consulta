<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntOficiales */

$this->title = 'Actualizar usuario móvil';
$this->params['classBody'] = "site-navbar-small site-menubar-hide oficiales-create";
?>

<h2 class="title-gral"><?= Html::encode($this->title) ?></h2>

<div class="actas-retencion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
