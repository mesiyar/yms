<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */

$this->title = '重置密码 ';
$this->params['breadcrumbs'][] = ['label' => '管理员密码', 'url' => ['index']];
$this->params['breadcrumbs'][] = '重置密码';
?>
<div class="admin-user-update">

    <?php $form = ActiveForm::begin()?>
        <?= $form->field($model, 'password')->textInput(['placeHolder' => '请输入新密码'])?>
    <?= $form->field($model, 'passwordRepeat')->textInput(['placeHolder' => '请再次输入新密码'])?>
    <div class="form-group">
        <?= Html::submitButton( '提交', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end()?>

</div>
