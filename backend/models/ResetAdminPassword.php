<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 17-7-19
 * Time: 下午2:37
 */
namespace backend\models;

use yii\base\Model;

/**
 * 重置管理员密码 模型
 * Class ResetAdminPassword
 * @package backend\models
 */
class ResetAdminPassword extends Model
{
    public $password;
    public $passwordRepeat;

    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['passwordRepeat',
                'compare',
                'compareAttribute' => 'password',
                'message' => '两次输入密码不一致',
            ]
        ];
    }

    /**
     * 标签
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'passwordRepeat' => '重复密码',
        ];
    }

    /**
     * 重置密码
     * @param $id
     * @return bool|null
     */
    public function resetPassword($id)
    {
        $params = \Yii::$app->request->post()['ResetAdminPassword'];

        $model = \common\models\User::findOne($id);
        $model->setPassword($params['password']);
        $model->removePasswordResetToken();
        return $model->save() ? true:  false;
    }
}