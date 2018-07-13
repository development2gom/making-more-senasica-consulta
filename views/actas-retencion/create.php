<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WrkActasRetencion */

$this->title = 'Create Wrk Actas Retencion';
$this->params['classBody'] = "site-navbar-small actas-retencion-create";

?>

<h2 class="title-gral"><?= Html::encode($this->title) ?></h2>

<div class="actas-retencion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
