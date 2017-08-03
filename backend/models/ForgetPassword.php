<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 17-8-2
 * Time: 下午8:35
 */
namespace backend\models;

use common\models\User;
use yii\base\Model;

/**
 * Class ForgetPassword
 * @property string $user
 * @property string $password
 * @property string $retypePassword
 * @package backend\models
 */

class ForgetPassword extends  Model
{
    /**
     * 用户名
     * @var $user
     */
    public $user;

    /**
     * 新密码
     * @var $password
     */
    public $password;

    /**
     * 确认密码
     * @var $retypePassword
     */
    public $retypePassword;

    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        return [
            [['password', 'retypePassword', 'user'], 'required'],
            [['password'], 'string', 'min'=> 6],
            [['user'], 'string'],
            [['retypePassword'], 'compare', 'compareAttribute' => 'password']
        ];
    }

    /**
     * 属性标签
     * @return array
     */
    public function attributeHints()
    {
        return  [
            'user' => '用户名',
            'password' => '新密码',
            'retypePassword' => '确认密码',
        ];
    }

    /**
     * 重置密码
     * @return bool
     */
    public function reset()
    {
        if($this->validate()) {
            /**
             * @var $user User
             */
            $user = User::find()->where(['username' => $this->user])->one();
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if($user->save()) {
                return true;
            } else {
                return false;
            }
        }
    }
}