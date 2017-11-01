<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 17-7-20
 * Time: 下午2:25
 */
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '部门列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index for_content">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加部门', '#', [
            'class' => 'btn btn-success',
            'id' => 'create',
            'data-toggle' => 'modal',
            'data-target' => '#create-department'
            ]) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'id',
            ],

            'id',
            'name',
            [
                'attribute' => 'dName.name',
                'label' => '上级部门',
                'value' => function($model) {
                    return empty($model->dName->name) ? '顶级部门' : $model->dName->name;
                }
            ],
            [
                'attribute' => 'createTime',
               // 'filter' => \kartik\datetime\DateTimePicker::widget([])
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->status ? Html::button('正常',['class' => 'btn btn-success btn-xs']) : Html::button('禁用',['class' => 'btn btn-danger btn-xs']);
                },
                'filter' => [
                    0 => '禁用',
                    1 => '正常'
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update}  {delete}',

            ],
        ],
    ]); ?>
</div>

<?php
\yii\bootstrap\Modal::begin([
    'id' => 'create-department',
    'header' => '<h4 align="center">添加部门</h4>',
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
