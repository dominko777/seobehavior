<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180816_062751_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'content' => Schema::TYPE_TEXT. ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}
