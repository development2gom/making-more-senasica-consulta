<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntOficiales */

$this->title = 'Actualizar Oficiales';
$this->params['breadcrumbs'][] = ['label' => 'Ent Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_oficial, 'url' => ['view', 'id' => $model->id_oficial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-oficiales-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
