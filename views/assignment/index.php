<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel jackh\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

// $columns = array_merge(
//     [
//     ['class' => 'yii\grid\SerialColumn'],
//     [
//         'class' => 'yii\grid\DataColumn',
//         'attribute' => $usernameField,
//     ],
//     ], $extraColumns, [
//     [
//         'class' => 'yii\grid\ActionColumn',
//         'template' => '{view}'
//     ],
//     ]
// );
?>
<div class="assignment-index">


    <?php
//Pjax::begin();
// GridView::widget([
//     'dataProvider' => $dataProvider,
//     'filterModel' => $searchModel,
//     'columns' => $columns,
// ]);
//Pjax::end();
?>
    <div class="dashboard-header">
        <a class="toolbar" multi-choose-mode>
            <i class="fa fa-check-square-o"></i>
        </a>
        <?php if ($searchModel->searched) {?>
        <a class="toolbar" action-bk2bsearch="" style="margin-right: 10px">
            <i class="fa fa-chevron-left"></i>
        </a>
        <?php }?>
        <a class="toolbar" data-toggle="collapse" data-target="#search-collapse">
            <i class="fa fa-search"></i>
        </a>
        <a class="toolbar pull-right" data-load="#dashboard-content" data-url="<?=Url::toRoute(['create']);?>">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <div class="collapse" id="search-collapse">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

<?=ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions'  => ['class' => 'item'],
    'summary'      => '',
    'itemView'     => function ($model, $key, $index, $widget) {
        $widget->itemOptions = array_merge($widget->itemOptions, [
            "data-url"        => Url::toRoute(['view', 'id' => $key]),
            "data-delete-url" => Url::toRoute(['delete', 'id' => $key]),
            "data-load"       => "#dashboard-content",
        ]);
        $title = Html::tag("p", Html::encode($model->username), ["class" => "title"]);
        return Html::tag("div", $title, ["class" => "content"]);
    },
    'pager'        => [
        'linkOptions' => ["data-load" => "#dashboard-list"],
    ],
    'emptyText'    => '<div class="text-center" style="margin-top: 120px;"><i class="fa fa-bookmark-o" style="font-size: 40px"></i><h3>' . Yii::t('app', 'no result found') . '</h3></div>',
])?>
</div>
