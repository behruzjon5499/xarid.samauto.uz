<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 */
class m201009_060537_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->text(),
            'title_uz' => $this->text(),
            'title_en' => $this->text(),
            'signup_ru' => $this->text(),
            'signup_uz' => $this->text(),
            'signup_en' => $this->text(),
            'support_ru' => $this->text(),
            'support_uz' => $this->text(),
            'support_en' => $this->text(),
            'podacha_ru' => $this->text(),
            'podacha_uz' => $this->text(),
            'podacha_en' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%document}}');
    }
}
