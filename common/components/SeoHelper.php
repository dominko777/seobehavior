<?php

namespace common\components;

use common\behaviors\SeoBehavior;
use Yii;

class SeoHelper
{

    protected static function getBehaviorSeoRecord($model)
    {
        foreach ($model->getBehaviors() as $b) {
            if ($b instanceof SeoBehavior) {
                return $b::getSeoRecord($model);
            }
        }
        throw new InvalidConfigException('Model ' . $model->className() . ' must have SeoBehavior');
    }

    public static function registerMetaTags($model)
    {
        $seo = self::getBehaviorSeoRecord($model);
        if ($seo) {
            $title = $seo->title;
            if ($title)
                Yii::$app->view->title = $title;
            self::registerSeoMetaTag($seo, 'keywords', 'keywords');
            self::registerSeoMetaTag($seo, 'description', 'description');
            self::registerSeoMetaTag($seo, 'viewport', 'viewport');
            self::registerSeoMetaTag($seo, 'canonical', 'canonical');
            self::registerSeoMetaTag($seo, 'og_title', 'og:title');
            self::registerSeoMetaTag($seo, 'og_image', 'og:image');
            if (empty($seo->twitter_site))
                $seo->twitter_site = $seo->title;
            self::registerSeoMetaTag($seo, 'twitter_site', 'twitter:site');
            self::registerSeoMetaTag($seo, 'twitter_title', 'twitter:title');
        }
    }

    protected static function registerSeoMetaTag($model, $attribute, $metaTagKey)
    {
        $value = $model->{$attribute};
        if ($value)
            Yii::$app->view->registerMetaTag(['name' => $metaTagKey, 'content' => $value], $metaTagKey);
    }

}
