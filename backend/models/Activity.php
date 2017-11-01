<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%activity}}".
 *
 * @property string $id
 * @property string $title
 * @property string $desc
 * @property string $activityTime
 * @property string $createTime
 * @property integer $creator
 * @property integer $status
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'activityTime', 'createTime', 'creator', 'status'], 'required'],
            [['activityTime', 'createTime'], 'safe'],
            [['creator', 'status'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['desc'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'activityTime' => 'Activity Time',
            'createTime' => 'Create Time',
            'creator' => 'Creator',
            'status' => 'Status',
        ];
    }
}
