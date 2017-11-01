<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $artID
 * @property integer $author
 * @property string $comment
 * @property string $createTime
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artID', 'author'], 'integer'],
            [['comment', 'createTime'], 'required'],
            [['createTime'], 'safe'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'artID' => '文章ID',
            'author' => '评论者',
            'comment' => 'Comment',
            'createTime' => 'Create Time',
        ];
    }
}
