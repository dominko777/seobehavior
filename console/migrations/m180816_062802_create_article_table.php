<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m180816_062802_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'content' => Schema::TYPE_TEXT. ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
