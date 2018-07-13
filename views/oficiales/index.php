<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EntOficiales;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntOficialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile(
  '@web/webAssets/js/oficiales/index.js',
  ['depends' => [\app\assets\AppAsset::className()]]
);

$this->title = 'Oficiales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-oficiales-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'contentOptions' => [
                  'class'=>"td-status"
                ],
                'attribute' => 'b_habilitado',
                'filter'=>[EntOficiales::STATUS_ACTIVED=>'Activo', EntOficiales::STATUS_BLOCKED=>'Inactivo'],
                'filterInputOptions'=>[
                    'prompt'=>'Ver todos'
                ],
                'format'=>'raw',
                
                'value'=>function($data){
  
                $activo = $data->b_habilitado == 1?'active':'';
                $inactivo = $data->b_habilitado == 0?'active':'';
                    
                  return '<div class="btn-groups" data-toggle="buttons" role="group">
                  <label class="btn btn-active '.$activo.'">
                  <input class="js-activar-oficial" type="radio" name="options" autocomplete="off" value="activar"   data-token="'.$data->uddi.'" />
                  Activo
                  </label>
                  <label class="btn btn-inactive '.$inactivo.'">
                  <input class="js-bloquear-oficial"  type="radio" name="options" autocomplete="off" value="bloquear"  data-token="'.$data->uddi.'" />
                  Inactivo
                  </label>
                  </div>';
                 
                }
              ],

            [
                'attribute' => 'Editar',
                'contentOptions' => [
                  'class'=>"td-actions td-actions-i1"
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
       
    ]); ?>
</div>
