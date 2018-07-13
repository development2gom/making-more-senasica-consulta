<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntOficialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exportar reportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?=$this->render('//actas-retencion/_search', ['model' => $searchModel]); ?>
</div>    