<?php

use yii\db\Migration;

/**
 * Handles the creation of table `seo`.
 */
class m180816_104650_create_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('seo', [
            'id' => $this->primaryKey(),
            'entity_class' => $this->string(),
            'entity_id' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'viewport' => $this->string(),
            'canonical' => $this->string(),
            'og_title' => $this->string(),
            'og_image' => $this->string(),
            'twitter_site' => $this->string(),
            'twitter_title' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('seo');
    }
}
