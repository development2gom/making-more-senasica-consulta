<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntOficiales */

$this->title = 'Crerar Oficiales';
$this->params['breadcrumbs'][] = ['label' => 'Ent Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-oficiales-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
