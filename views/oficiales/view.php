<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntOficiales */

$this->title = $model->id_oficial;
$this->params['breadcrumbs'][] = ['label' => 'Ent Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-oficiales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_oficial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_oficial], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_oficial',
            'uddi',
            'txt_nombre_usuario',
            'txt_contrasena',
            'fch_creacion',
            'txt_oisa',
            'txt_nombre',
            'txt_apellido_paterno',
            'txt_apellido_materno',
            'txt_rol',
            'txt_clave_tea',
            'txt_curp',
            'txt_rfc',
            'b_habilitado',
        ],
    ]) ?>

</div>
