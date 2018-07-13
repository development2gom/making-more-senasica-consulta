<?php

use yii\helpers\Html;
use app\models\Calendario;
use app\modules\ModUsuarios\models\EntUsuarios;
use kop\y2sp\ScrollPager;
use app\components\LinkSorterExtends;
use yii\helpers\Url;
use sjaakp\alphapager\AlphaPager;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\date\DatePicker;
use app\models\AuthItem;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';

$this->params['headerActions'] = '<a class="btn btn-success no-pjax" href="'.Url::base().'/usuarios/create"><i class="icon wb-plus"></i> Agregar usuario</a>';

$this->params['classBody'] = "site-navbar-small usuarios-list";

$this->registerJsFile(
  '@web/webAssets/js/usuarios/index.js',
  ['depends' => [\app\assets\AppAsset::className()]]
);
?>

<div class="list-head">

  <h2 class="title"><?=$this->title?></h2>

  <div class="list-actions">
    <?= Html::a('<span><i class="icon wb-plus" aria-hidden="true"></i>Crear</span>', ['create'], ['class' => 'btn btn-primary btn-animate btn-animate-vertical']) ?>
  </div>

</div>


<div class="list-panel">

  <?php
  echo GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel'=>$searchModel,
      'tableOptions' => [
          'class'=>"table table-hover list-table"
      ],
      'layout' => '{items}{summary}{pager}',
      'responsive'=>true,
      'striped'=>false,
      'hover'=>false,
      'bordered'=>false,
      'pjax'=>true,
      'pjaxSettings'=>[
        'options'=>[
          'linkSelector'=>"a:not(.no-pjax)"
        ]
      ],
      'layout' => '{items}{summary}{pager}',
      'columns' =>[
        [
          'filterInputOptions' => [
            'autocomplete' => 'nofill', 
            'class'=>"form-control"
          ],
          'attribute' => 'nombreCompleto',
          'contentOptions' => [
            'class'=>"td-capitalize text-center"
          ],
          'format'=>'raw',
          'contentOptions' => [
            'class'=>"flex"
          ],
          'value'=>function($data){
              
          // return '<a class="no-pjax" href="'.Url::base().'/usuarios/update/'.$data->id_usuario.'"><img class="panel-listado-img" src="'.$data->imageProfile.'" alt="">
          return  '<span>'.$data->nombreCompleto .'</span>';
          }
        ],
        [
          'attribute' => 'roleDescription',
          'headerOptions' => ['class' => 'text-center'],
          'contentOptions' => ['class' => 'text-center'],
          'filter'=>ArrayHelper::map($roles, 'name', 'description'),
        ],
        'txt_email',
        'password',
        [
          'headerOptions' => ['class' => 'text-center'],
          'contentOptions' => ['class' => 'td-status text-center'],
          'attribute' => 'id_status',
          'filter'=>[EntUsuarios::STATUS_ACTIVED=>'Activo', EntUsuarios::STATUS_BLOCKED=>'Inactivo'],
          'format'=>'raw',
          
          'value'=>function($data){

          $activo = $data->id_status == 2?'active':'';
          $inactivo = $data->id_status == 1||$data->id_status == 3?'active':'';
              
            return '<div class="btn-groups" data-toggle="buttons" role="group">
            <label class="btn btn-sm btn-active '.$activo.'">
            <input class="js-activar-usuario" type="radio" name="options" autocomplete="off" value="activar"   data-token="'.$data->txt_token.'" data-url="'.Url::base().'" />
            Activo
            </label>
            <label class="btn btn-sm btn-inactive '.$inactivo.'">
            <input class="js-bloquear-usuario"  type="radio" name="options" autocomplete="off" value="bloquear"  data-token="'.$data->txt_token.'" data-url="'.Url::base().'"/>
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
            // return '<a href="'.Url::base().'/usuarios/update/'.$data->id_usuario.'" class="btn btn-outline btn-success btn-sm no-pjax"><i class="icon wb-edit"></i></a>';     
            $a = Html::a("<i class='icon wb-pencil' aria-hidden='true'></i>", 
            ["usuarios/update", 'id'=>$data->id_usuario], 
            [
                "class"=>"btn btn-primary btn-edit no-pjax js-confirmar-cita"
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
        ]
    
  ]);?>

</div>

      
    
<!-- Panel -->
<div class="panel panel-list-user-table">
      
    <?php
    $sort = "txt_username";
    if(isset($_GET['sort'])){
      $sort = substr($_GET['sort'], 0,1);
      if($sort=="-"){
        $sort = substr($_GET['sort'], 1);
      }else{
        $sort = $_GET['sort'];
      }
    }
    #exit;
    ?>
    
   
    <?php
    /*
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'=>$searchModel,
        'options' => [
          'class'=>"panel-table-int"
        ],
        'responsive'=>true,
        'striped'=>false,
        'hover'=>false,
        'bordered'=>false,
        'pjax'=>true,
        'pjaxSettings'=>[
          'options'=>[
            'linkSelector'=>"a:not(.no-pjax)"
          ]
        ],
        'tableOptions' => [
          'class'=>"table table-hover"
        ],
        'layout' => '{items}{summary}{pager}',
        'columns' =>[
          [
            'filterInputOptions' => [
              'autocomplete' => 'nofill', 
              'class'=>"form-control"
            ],
            'attribute' => 'nombreCompleto',
            
            'format'=>'raw',
            'contentOptions' => [
              'class'=>"flex"
            ],
            'value'=>function($data){
                
             // return '<a class="no-pjax" href="'.Url::base().'/usuarios/update/'.$data->id_usuario.'"><img class="panel-listado-img" src="'.$data->imageProfile.'" alt="">
             return  '<span>'.$data->nombreCompleto .'</span>';
            }
          ],
          [
            'attribute' => 'roleDescription',
            'filter'=>ArrayHelper::map($roles, 'name', 'description'),
          ],
          'txt_email',
          'password',
          [
            'attribute' => 'id_status',
            'filter'=>[EntUsuarios::STATUS_ACTIVED=>'Activo', EntUsuarios::STATUS_BLOCKED=>'Inactivo'],
            'format'=>'raw',
            
            'value'=>function($data){

            $activo = $data->id_status == 2?'active':'';
            $inactivo = $data->id_status == 1||$data->id_status == 3?'active':'';
                
              return '<div class="btn-group" data-toggle="buttons" role="group">
              <label class="btn btn-active '.$activo.'"  data-token="'.$data->txt_token.'">
              <input class="js-activar-usuario" type="radio" name="options" autocomplete="off" value="male" checked />
              Activo
              </label>
              <label class="btn btn-inactive '.$inactivo.'" data-token="'.$data->txt_token.'">
              <input class="js-bloquear-usuario"  type="radio" name="options" autocomplete="off" value="female" />
              Inactivo
              </label>
              </div>';
            }
          ],
          [
            'attribute' => 'Editar',
            'format'=>'raw',
           
            'value'=>function($data){
                
              return '<a href="'.Url::base().'/usuarios/update/'.$data->id_usuario.'" class="btn btn-outline btn-success btn-sm no-pjax"><i class="icon wb-edit"></i></a>';
            }
          ]
        ],
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
        ]
      
    ]);
    */
    ?>
    

</div>
<!-- End Panel -->
