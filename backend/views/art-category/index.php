<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ArtCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-category-index for_content">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加分类', '#', [
            'class' => 'btn btn-success',
            'id' => 'create',
            'data-toggle' => 'modal',
            'data-target' => '#create-department'
        ]) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'cate',
            'sortOrder',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
<?php
\yii\bootstrap\Modal::begin([
    'id' => 'create-department',
    'header' => '<h4 align="center">添加分类</h4>',
    'footer' => '<a href="#" class="btn btn-default" data-dismiss="modal">关闭</a>',
    'headerOptions' => [
        'style' => 'background-color:#46be8a;color:#fff'
    ],
]);
\yii\bootstrap\Modal::end();

$requestUrl = \yii\helpers\Url::toRoute('create');
$js = <<<JS
    $(document).on('click', '#create', function(e){
        $.get('{$requestUrl}',{},function(data){
            $($('#create-department').children().children().children()[1]).html(data);
        })
    });
JS;

$this->registerJs($js);
?>