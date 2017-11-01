<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArtCategory */

$this->title = 'Create Art Category';
$this->params['breadcrumbs'][] = ['label' => 'Art Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-category-create">

    <div class="art-category-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cate')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sortOrder')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton( '添加', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
