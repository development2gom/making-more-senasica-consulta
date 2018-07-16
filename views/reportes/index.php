<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntOficialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exportar reportes';
$this->params['classBody'] = "site-navbar-small site-menubar-hide reportes-create";
?>

<?=$this->render('//actas-retencion/_search', ['model' => $searchModel]); ?>