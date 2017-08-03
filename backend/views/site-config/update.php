<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteConfig */

$this->title = '网站配置';
$this->params['breadcrumbs'][] = ['label' => 'Site Configs', 'url' => ['index']];
?>
<div class="site-config-update for_content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
