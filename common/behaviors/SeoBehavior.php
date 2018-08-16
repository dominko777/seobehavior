<?php

namespace common\behaviors;

use common\models\Seo;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class SeoBehavior extends Behavior {

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'saveSeo',
            ActiveRecord::EVENT_AFTER_UPDATE => 'saveSeo',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteSeo',
        ];
    }

    public function saveSeo() {
        $model = $this->getSeoModel();
        $model->title = $this->owner->seoTitle;
        $model->keywords = $this->owner->seoKeywords;
        $model->description = $this->owner->seoDescription;
        $model->viewport = $this->owner->seoViewport;
        $model->canonical = $this->owner->seoCanonical;
        $model->og_title = $this->owner->seoOg_title;
        $model->og_image = $this->owner->seoOg_image;
        $model->twitter_site = $this->owner->seoTwitter_site;
        $model->twitter_title = $this->owner->seoTwitter_title;
        $model->save();
    }


    public function getSeoModel() {
        $seoModel = Seo::find()->where([
            'entity_id' => $this->owner->getPrimaryKey(),
            'entity_class' => $this->owner->className()
        ])->one();
        if ($seoModel === null) {
            $seoModel = new Seo();
            $seoModel->entity_id = $this->owner->getPrimaryKey();
            $seoModel->entity_class = $this->owner->className();
        }
        return $seoModel;
    }

    public static function getSeoRecord($model) {
        return Seo::find()->where([
            'entity_id' => $model->getPrimaryKey(),
            'entity_class' => $model->className()
        ])->one();
    }

    public function deleteSeo() {
        $model = $this->getSeoModel();
        if ($model && !$model->getIsNewRecord()) {
            $model->delete();
        }
    }

}