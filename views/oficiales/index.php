<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\EntOficiales;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntOficialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile(
  '@web/webAssets/js/oficiales/index.js',
  ['depends' => [\app\assets\AppAsset::className()]]
);


$this->title = 'Usuarios móviles';

$this->params['classBody'] = "site-navbar-small usuarios-list";

?>

<div class="list-head">

  <h2 class="title"><?=$this->title?></h2>

  <div class="list-actions">
    <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-primary']) ?>
  </div>

</div>


<div class="list-panel">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
          'class'=>"table table-hover list-table"
        ],
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            //'id_oficial',
            //'uddi',
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
            // 'b_habilitado',
            [
              'headerOptions' => ['class' => 'text-center'],
              'contentOptions' => ['class' => 'td-status text-center'],
                'attribute' => 'b_habilitado',
                'filter'=>[EntOficiales::STATUS_ACTIVED=>'Activo', EntOficiales::STATUS_BLOCKED=>'Inactivo'],
                'filterInputOptions'=>[
                    'prompt'=>'Ver todos',
                    'class'=>'form-control',
                ],

                'format'=>'raw',
                
                'value'=>function($data){
  
                $activo = $data->b_habilitado == 1?'active':'';
                $inactivo = $data->b_habilitado == 0?'active':'';
                    
                  return '<div class="btn-groups" data-toggle="buttons" role="group">
                  <label class="btn btn-sm btn-active '.$activo.'">
                  <input class="js-activar-oficial" type="radio" name="options" autocomplete="off" value="activar"   data-uddi="'.$data->uddi.'" data-url="'.Url::base().'" />
                  Activo
                  </label>
                  <label class="btn btn-sm btn-inactive '.$inactivo.'">
                  <input class="js-bloquear-oficial"  type="radio" name="options" autocomplete="off" value="bloquear"  data-uddi="'.$data->uddi.'" data-url="'.Url::base().'" />
                  Inactivo
                  </label>
                  </div>';
                 
                }
              ],

            [
                'attribute' => 'Editar',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => [
                  'class'=>"td-actions td-actions-i1 text-center"
                ],
                'format'=>'raw',
              
                'value'=>function($data){
                       
                  $a = Html::a("<i class='icon wb-pencil' aria-hidden='true'></i>", 
                  ["oficiales/update", 'id'=>$data->id_oficial], 
                  [
                      "class"=>"btn btn-primary btn-aprobar no-pjax js-confirmar-oficial"
                  ]);
  
                  $contenedor = '<div class="td-actions-tooltip" data-toggle="tooltip" data-original-title="Editar" data-template="<div class=\'tooltip tooltip-2 tooltip-success\' role=\'tooltip\'><div class=\'arrow\'></div><div class=\'tooltip-inner\'></div></div>">
                    '.$a.' 
                  </div>';
  
                  return $contenedor;
             
  
                }
              ]
        ],
        'panelTemplate' => "{panelHeading}\n{items}\n{summary}\n{pager}",
        'responsive'=>true,
        'striped'=>false,
        'hover'=>false,
        'bordered'=>false,
        'pager'=>[
            'linkOptions' => [
                'class' => 'page-link'
            ],
            'pageCssClass'=>'page-item',
            'prevPageCssClass' => 'page-item',
            'nextPageCssClass' => 'page-item',
            'firstPageCssClass' => 'page-item',
            'lastPageCssClass' => 'page-item',
            'maxButtonCount' => '5',
        ],
       
    ]); ?>
</div>
