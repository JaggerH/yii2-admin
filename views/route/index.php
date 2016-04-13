<?php

use yii\helpers\Json;
use yii\helpers\Url;

/* @var $this yii\web\View */
$opts = Json::htmlEncode([
    'newUrl'     => Url::to(['create']),
    'assignUrl'  => Url::to(['assign']),
    'refreshUrl' => Url::to(['refresh']),
    'routes'     => $routes,
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
?>
<div class="row">
    <div class="col-sm-9">
        <div class="form-group">
            <input id="inp-route" type="text" class="form-control"placeholder="<?=Yii::t('rbac-admin', 'New route(s)')?>">
        </div>
    </div>
    <div class="com-sm-3">
        <button id="btn-new" class="btn btn-success" type="button">
            <?=Yii::t('rbac-admin', 'Add')?>
        </button>
    </div>
</div>
<p>&nbsp;</p>
<div class="row">
    <div class="col-sm-5">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <input class="form-control search" data-target="avaliable" placeholder="<?=Yii::t('rbac-admin', 'Search for avaliable')?>">
                </div>
            </div>
            <div class="col-sm-2">
                <button id="btn-refresh" class="btn-icon btn-primary"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">unchoose route</h3>
            </div>
            <select multiple size="8" class="form-control list" data-target="avaliable" style="border: 0"></select>
        </div>
    </div>
    <div class="col-sm-2 text-center">
        </br></br></br></br></br></br>
        <a href="#" class="btn-icon btn-danger" data-action="assign"><i class="fa fa-angle-double-left"></i></a></br>
        <a href="#" class="btn-icon btn-warning" data-action="remove"><i class="fa fa-angle-double-right"></i></a>
    </div>
    <div class="col-sm-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input class="form-control search" data-target="assigned" placeholder="<?=Yii::t('rbac-admin', 'Search for assigned')?>" />
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">choosed route</h3>
            </div>
            <select multiple size="8" class="form-control list" data-target="assigned" style="border: 0"></select>
        </div>
    </div>
</div>
