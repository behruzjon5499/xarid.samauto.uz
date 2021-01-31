<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback_send}}`.
 */
class m210114_133723_create_feedback_send_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%feedback_send}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'feedback_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('index-feedback_send-feedback_id', 'feedback_send', 'feedback_id');
$this->addForeignKey('fkey-feedback_send-feedback_id', 'feedback_send', 'feedback_id', 'feedback', 'id', 'RESTRICT', 'RESTRICT');
}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback_send}}');
    }
}
