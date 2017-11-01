<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $content
 * @property integer $author
 * @property string $tags
 * @property integer $category
 * @property string $createTime
 * @property string $updateTime
 * @property integer $view
 * @property integer $star
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['author', 'category', 'view', 'star'], 'integer'],
            [['createTime', 'updateTime'], 'safe'],
            [['title', 'subtitle', 'tags'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'subtitle' => '副标题',
            'content' => '内容',
            'author' => '作者',
            'tags' => '标签',
            'category' => '分类',
            'createTime' => '创建时间',
            'updateTime' => '更新时间',
            'view' => '点击量',
            'star' => '点赞量',
        ];
    }

    public function beforeSave($insert)
    {
        $this->author = Yii::$app->user->id;
        if($insert) {
            $this->createTime = date('Y-m-d H:i:s');
        } else {
            $this->updateTime = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
