<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加管理员', ['create'], [
            'id' => 'create',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#create-user'
        ]) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
             'status',
            [
                'attribute' => 'created_at',
                'value' => function($model) {
                    return date('Y-m-d H:i:s', $model->created_at);
                }
            ],
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>
<?php
\yii\bootstrap\Modal::begin([
    'id' => 'create-user',
    'header' => '<h4 align="center">添加管理员</h4>',
    'footer' => '<a href="#" class="btn btn-sm btn-primary" data-dismiss="modal">关闭 </a>'
]);
\yii\bootstrap\Modal::end();
$requestUrl = \yii\helpers\Url::toRoute('create');
$js = <<<JS
    $(document).on('click', '#create', function(e){
        $.get('{$requestUrl}',{},function(data){
            $('.modal-body').html(data);
        });
    });
JS;

$this->registerJs($js);

?>

