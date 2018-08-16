<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string $entity_class
 * @property int $entity_id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $viewport
 * @property string $canonical
 * @property string $og_title
 * @property string $og_image
 * @property string $twitter_site
 * @property string $twitter_title
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_id', 'entity_class'], 'required'],
            [['entity_id'], 'integer'],
            [['entity_class', 'title', 'description', 'keywords', 'viewport', 'canonical', 'og_title', 'og_image', 'twitter_site', 'twitter_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'entity_class' => Yii::t('app', 'Entity Class'),
            'entity_id' => Yii::t('app', 'Entity ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'keywords' => Yii::t('app', 'Keywords'),
            'viewport' => Yii::t('app', 'Viewport'),
            'canonical' => Yii::t('app', 'Canonical'),
            'og_title' => Yii::t('app', 'Og Title'),
            'og_image' => Yii::t('app', 'Og Image'),
            'twitter_site' => Yii::t('app', 'Twitter Site'),
            'twitter_title' => Yii::t('app', 'Twitter Title'),
        ];
    }
}
