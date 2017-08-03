<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 17-8-2
 * Time: 下午8:52
 * @var $model backend\models\ForgetPassword
 * @var $this  \yii\web\View;
 */
use \yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = '重置密码';
?>

<div class="reset-password">
    <?php $form = ActiveForm::begin()?>
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'user')->textInput()?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'password')->passwordInput()?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'retypePassword')->passwordInput()?>
        </div>
        <div class="col-sm-3">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end()?>
</div>
