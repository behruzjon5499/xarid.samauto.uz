<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question_answer}}`.
 */
class m200928_053415_create_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%question_answer}}', [
            'id' => $this->primaryKey(),
            'question_ru' => $this->string()->notNull(),
            'question_uz' => $this->string()->notNull(),
            'question_en' => $this->string()->notNull(),
            'answer_ru' => $this->text()->notNull(),
            'answer_uz' => $this->text()->notNull(),
            'answer_en' => $this->text()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%question_answer}}');
    }
}
