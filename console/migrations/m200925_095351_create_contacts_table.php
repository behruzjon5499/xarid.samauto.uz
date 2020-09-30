<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m200925_095351_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string()->notNull(),
            'title_uz' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'phone1' => $this->string()->notNull(),
            'phone2' => $this->string()->notNull(),
            'address_ru' => $this->text()->notNull(),
            'address_uz' => $this->text()->notNull(),
            'address_en' => $this->text()->notNull(),
            'email' => $this->string()->notNull(),
            'home_phone' => $this->string(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
