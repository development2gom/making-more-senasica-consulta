<?php
use yii\helpers\Url;
use app\modules\ModUsuarios\models\EntUsuarios;
$usuario = EntUsuarios::getUsuarioLogueado();

?>
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse  sub-navbar"
role="navigation">

  <div class="nav-menu-container">

  <div class="navbar-header">
    <!-- <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
    data-toggle="menubar">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-bar"></span>
    </button> -->
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
    data-toggle="collapse">
      <i class="icon wb-more-horizontal" aria-hidden="true"></i>
    </button>
    <a class="navbar-brand navbar-brand-center" href="<?=Url::base()?>">
      Senasica
      <!-- <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?=Url::base()?>/webAssets/images/senasica.png"
      title="Remark">
      <img class="navbar-brand-logo navbar-brand-logo-special" src="<?=Url::base()?>/webAssets/images/senasica.png"
      title="Remark"> -->
      
    </a>
    
  </div>
  <div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <!-- Navbar Toolbar -->
      <ul class="nav navbar-toolbar">
        <li class="nav-item hidden-float" id="toggleMenubar">
          <a class="nav-link" data-toggle="menubar" href="#" role="button">
            <i class="icon hamburger hamburger-arrow-left">
                <span class="sr-only">Toggle menubar</span>
                <span class="hamburger-bar"></span>
              </i>
          </a>
        </li>
      </ul>
      <!-- End Navbar Toolbar -->
      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        <li class="nav-item">
          <a class="nav-link no-pjax" href="<?=Url::base()?>/reportes">Reportes</a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link no-pjax" href="<?=Url::base()?>/actas-retencion">Actas</a> -->
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle no-pjax" data-toggle="dropdown" role="button" aria-expanded="false">Catálogos <span class="caret"></span></a>
          <ul class="dropdown-menu no-pjax" role="menu">
            <li><a class='no-pjax' href="<?=Url::base()?>/usuarios">Usuarios web</a></li>
            <li><a class='no-pjax' href="<?=Url::base()?>/oficiales">Usuarios móviles</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link no-pjax" href="<?=Url::base()?>/site/logout"><i class="icon wb-power no-pjax" aria-hidden="true"></i> Logout</a>
        </li>
        
      </ul>
      <!-- End Navbar Toolbar Right -->
    </div>
    <!-- End Navbar Collapse -->
  </div>

  </div>

</nav>