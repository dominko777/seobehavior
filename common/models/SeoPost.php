<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo_post".
 *
 * @property int $id
 * @property string $content
 */
class SeoPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo_post';
    }

    public $seoTitle;
    public $seoDescription;
    public $seoKeywords;
    public $seoViewport;
    public $seoCanonical;
    public $seoCg_title;
    public $seoOg_image;
    public $seoTwitter_site;
    public $seoTwitter_title;
    public $seoOg_title;

    public function behaviors()
    {
        return [
            'seo' => [
                'class' => 'common\behaviors\SeoBehavior',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['seoTitle', 'seoDescription', 'seoKeywords', 'seoViewport', 'seoCanonical', 'seoCg_title', 'seoOg_image', 'seoTwitter_site', 'seoTwitter_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content' => Yii::t('app', 'Content'),
        ];
    }
}
