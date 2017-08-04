<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 17-8-3
 * Time: 下午5:53
 */
namespace backend\controllers;

use Yii;
use backend\models\SiteConfig;
use yii\web\Controller;

class BasicController extends Controller
{
    /**
     * 重写了beforeAction
     * 将系统配置拉出来
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        $config = SiteConfig::find()->asArray()->one();
        Yii::$app->session->set('system', $config);
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * 成功弹出层
     * @param $message
     */
    protected function success($message= '操作成功')
    {
        Yii::$app->session->setFlash('success', $message);
    }

    /**
     * 错误弹出层
     * @param $message
     */
    protected function error($message = '操作失败')
    {
        Yii::$app->session->setFlash('error', $message);
    }
}