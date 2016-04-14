<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model jackh\admin\models\AuthItem */
$this->title = Yii::t('rbac-admin', 'Update Role') . ': ' . $model->name;

$opts = Json::htmlEncode([
    'assignUrl' => Url::to(['assign', 'id' => $model->name]),
    'items'     => $items,
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
?>
<div class="auth-item-update">

    <h3><?=Html::encode($this->title)?></h3>
    <?=
$this->render('_form', [
    'model' => $model,
]);
?>

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
                <select multiple size="15" class="form-control list" data-target="avaliable" style="border: 0"></select>
            </div>
        </div>
        <div class="col-sm-2 text-center">
            </br></br></br></br></br></br>
            <a href="#" class="btn-icon btn-danger btn-assign" data-action="assign"><i class="fa fa-angle-double-right"></i></a></br>
            <a href="#" class="btn-icon btn-warning btn-assign" data-action="remove"><i class="fa fa-angle-double-left"></i></a>
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
                <select multiple size="15" class="form-control list" data-target="assigned" style="border: 0"></select>
            </div>
        </div>
    </div>
</div>
