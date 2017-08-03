<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property string $createTime
 * @property integer $status
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['pid', 'status'], 'integer'],
            [['createTime'], 'safe'],
            [['name'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'name' => '部门名称',
            'pid' => '上级id',
            'createTime' => '创建时间',
            'status' => '状态（0 弃用 1 启用）',
        ];
    }
}