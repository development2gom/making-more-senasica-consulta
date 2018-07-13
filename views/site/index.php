<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = "Dashboard";

$this->params['classBody'] = "site-navbar-small dashboard";
?>

<h1>h1. Ejemplo Texto</h1>

<h2>h1. Ejemplo Texto</h2>

<h3>h1. Ejemplo Texto</h3>

<h4>h1. Ejemplo Texto</h4>

<h5>h1. Ejemplo Texto</h5>

<h6>h1. Ejemplo Texto</h6>


<form action="">

    <div class="form-group">
        <input type="text" class="form-control" placeholder="Input">
    </div>

    <div class="form-group">
        <input type="passwrod" class="form-control" placeholder="Input">
    </div>

    <div class="form-group">
        <textarea class="form-control" rows="3" placeholder="Textarea"></textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-primary">Primary</button>
        <button class="btn btn-error">Error</button>
        <button class="btn btn-default">Secondary</button>
    </div>

    <div class="form-group">
        <button class="btn btn-primary active">Primary</button>
        <button class="btn btn-error active">Error</button>
        <button class="btn btn-default active">Secondary</button>
    </div>

    <div class="form-group">
        <button class="btn btn-primary disabled">Primary</button>
        <button class="btn btn-error disabled">Error</button>
        <button class="btn btn-default disabled">Secondary</button>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-lg">Primary Grande</button>
        <button class="btn btn-error btn-lg">Error Grande</button>
        <button class="btn btn-default btn-lg">Default Grande</button>
    </div>

    <div class="form-group">
        <button class="btn btn-primary">Primary</button>
        <button class="btn btn-error">Error</button>
        <button class="btn btn-default">Default</button>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-sm">Primary Mediano</button>
        <button class="btn btn-error btn-sm">Error Mediano</button>
        <button class="btn btn-default btn-sm">Default Mediano</button>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-xs">Primary Chico</button>
        <button class="btn btn-error btn-xs">Error Chico</button>
        <button class="btn btn-default btn-xs">Default Chico</button>
    </div>

    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" data-trigger="hover" data-original-title="Hover to tooltip" title="" aria-describedby="tooltip198811">Tooltip</button>


    <button class="btn btn-primary" data-target="#modal-example" data-toggle="modal" type="button">Modal</button>

    <div class="modal fade" id="modal-example" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</form>
