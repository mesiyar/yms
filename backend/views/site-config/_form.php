<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-config-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'logo')->fileInput(['id'=> 'up']) ?>
        </div>
        <div class="col-sm-3">
            <label for="">老logo</label>
            <img src="<?= '/images/logo/'.$model->logo?>" alt="">
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'desc')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'keywords')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'pageSize')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'theme')->dropDownList(\backend\models\SiteConfig::$themeMap, ['prompt' => '请选择','id' => 'for_theme']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '提交', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
    
    $('#for_theme').change(function(e){
       var v = $(this).val() ? $(this).val() : 'skin-blue' ;
       $('#imbody').attr('class','hold-transition '+v+' sidebar-mini');
    });

JS;

$this->registerJs($js);
?>