<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auctions}}`.
 */
class m210109_103528_create_auctions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%auctions}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title_ru' => $this->text(),
            'title_uz' => $this->text(),
            'title_en' => $this->text(),
            'file' => $this->string(),
            'obyom' => $this->string(),
            'company_id' => $this->integer()->notNull(),
            'address' => $this->string(),
            'start_price' => $this->string()->notNull(),
            'start_date' => $this->string()->notNull(),
            'end_date' => $this->string()->notNull(),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'inn' => $this->string(),
            'mfo' => $this->string(),
            'account_number' => $this->string(),
            'bank' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('index-auctions-company_id', 'auctions', 'company_id');
        $this->addForeignKey('fkey-auctions-company_id', 'auctions', 'company_id', 'companies', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('index-auctions-user_id', 'auctions', 'user_id');
        $this->addForeignKey('fkey-auctions-user_id', 'auctions', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auctions}}');
    }
}
