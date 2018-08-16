<?php

use yii\db\Migration;

/**
 * Handles the creation of table `seo_post`.
 */
class m180816_104841_create_seo_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('seo_post', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('seo_post');
    }
}
