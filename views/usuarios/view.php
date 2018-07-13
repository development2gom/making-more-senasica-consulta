<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios */

$this->title = $model->txt_username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_usuario], [
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
            'id_usuario',
            'txt_auth_item',
            'txt_token',
            'txt_imagen',
            'txt_username',
            'txt_apellido_paterno',
            'txt_apellido_materno',
            'txt_auth_key',
            'txt_password_hash',
            'txt_password_reset_token',
            'txt_email:email',
            'fch_creacion',
            'fch_actualizacion',
            'id_status',
        ],
    ]) ?>

</div>