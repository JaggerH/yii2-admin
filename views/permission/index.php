<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel jackh\admin\models\AuthItemSearch */
?>
<div class="role-index">
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
            "data-url"        => Url::toRoute(['update', 'id' => $model->name]),
            "data-delete-url" => Url::toRoute(['delete', 'id' => $model->name]),
            "data-load"       => "#dashboard-content",
        ]);
        $title   = Html::tag("p", Html::encode($model->name), ["class" => "title"]);
        $content = Html::tag("p", $model->description ? Html::encode($model->description) : 'Not Set', ["class" => "text"]);
        $date    = new DateTime();
        $date->setTimestamp($model->createdAt);
        $date = Html::tag("p", $date->format('Y-m-d H:i:s'), ["class" => "text-muted"]);
        return Html::tag("div", $title . $content . $date, ["class" => "content"]);
    },
    'pager'        => [
        'linkOptions' => ["data-load" => "#dashboard-list"],
    ],
    'emptyText'    => '<div class="text-center" style="margin-top: 120px;"><i class="fa fa-bookmark-o" style="font-size: 40px"></i><h3>' . Yii::t('app', 'no result found') . '</h3></div>',
])?>
</div>
