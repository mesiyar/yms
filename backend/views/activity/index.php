<?php

use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index for_content">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity', ['create'], [
        'class' => 'btn btn-success',
        'id' => 'create',
        'data-toggle' => 'modal',
        'data-target' => '#operate-modal',]) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'persistResize'=>true,
        'toolbar'=> [
            ['content'=>

                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],
            '{export}',
            '{toggleData}',
        ],
        'pjax' => true,
        'toggleDataOptions'=>['minCount'=>10],
        'panel'=>[
            'type'=>\kartik\grid\GridView::TYPE_PRIMARY,
            'heading'=> '详细数据',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'desc',
            'activityTime',
            'createTime',
            // 'creator',
            // 'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
                'header' => '操作',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a("信息", $url, [
                            'title' => '栏目信息',
                            // btn-update 目标class
                            'class' => 'btn btn-default btn-update',
                            'data-toggle' => 'modal',
                            'data-target' => '#operate-modal',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('删除', $url, [
                            'title' => '删除',
                            'class' => 'btn btn-default',
                            'data' => [
                                'confirm' => '确定要删除么?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ]
        ]);
     ?>
<?php Pjax::end(); ?></div>
<?php
// 创建modal
Modal::begin([
    'id' => 'operate-modal',
    'header' => '<h4 class="modal-title"></h4>',
]);
Modal::end();
// 创建
$requestCreateUrl = Url::toRoute('create');
// 更新
$requestUpdateUrl = Url::toRoute('update');
$js = <<<JS
    // 创建操作
    $('#create').on('click', function () {
        $('.modal-title').html('创建');
            $.get('{$requestCreateUrl}',
            function (data) {
                $('.modal-body').html(data);
            }
        );
    });
    // 更新操作
    $('.btn-update').on('click', function () {
        $('.modal-title').html('信息');
            $.get('{$requestUpdateUrl}', { id: $(this).closest('tr').data('key') },
            function (data) {
                $('.modal-body').html(data);
            }
        );
    });
JS;
$this->registerJs($js);
?>