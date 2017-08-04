<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "site_config".
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property string $desc
 * @property string $keywords
 * @property integer $pageSize
 * @property string $theme
 */
class SiteConfig extends \yii\db\ActiveRecord
{
    public static $themeMap = [
        'skin-blue' => '蓝色',
        'skin-black' => '黑色',
        'skin-red' => '红色',
        'skin-yellow' => '黄色',
        'skin-purple' => '紫色',
        'skin-green' => '绿色'
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'keywords', 'pageSize', 'theme'], 'required'],
            [['pageSize', 'id'], 'integer'],
            ['logo', 'image', 'extensions' => 'png, jpg',],
            [['title', 'desc', 'keywords', 'theme'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => '网站名称',
            'logo' => 'Logo',
            'desc' => '网站描述',
            'keywords' => '网站关键词',
            'pageSize' => '默认分页条数',
            'theme' => '后台主题',
        ];
    }


}
