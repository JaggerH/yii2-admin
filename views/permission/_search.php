<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permission-search">

    <?php $form = ActiveForm::begin([
    'action'  => ['index'],
    'method'  => 'get',
    'options' => [
        'data-load' => '#dashboard-list',
    ],
]);?>

    <?=$form->field($model, 'name')?>

    <?=$form->field($model, 'description')?>

    <div class="form-group">
        <?=Html::submitButton(Yii::t('rbac-admin', 'Search'), ['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
