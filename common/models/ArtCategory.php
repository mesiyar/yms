<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "art_category".
 *
 * @property integer $id
 * @property string $cate
 * @property integer $sortOrder
 */
class ArtCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'art_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate', 'sortOrder'], 'required'],
            [['id', 'sortOrder'], 'integer'],
            [['cate'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate' => '分类名',
            'sortOrder' => '排序值',
        ];
    }
}
