<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
class m200929_072441_create_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'icon' => $this->string()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
