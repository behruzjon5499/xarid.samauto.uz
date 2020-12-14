<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auctions}}`.
 */
class m201012_120427_create_auctions_table extends Migration
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
            'address_ru' => $this->text(),
            'address_uz' => $this->text(),
            'address_en' => $this->text(),
            'start_price' => $this->string()->notNull(),
            'next_price' => $this->string(),
            'start_date' => $this->string()->notNull(),
            'end_date' => $this->string()->notNull(),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'contacts_auction_ru' => $this->text(),
            'contacts_auction_uz' => $this->text(),
            'contacts_auction_en' => $this->text(),
            'price_auction_ru' => $this->text(),
            'price_auction_uz' => $this->text(),
            'price_auction_en' => $this->text(),
            'predmet_auction_ru' => $this->text(),
            'predmet_auction_uz' => $this->text(),
            'predmet_auction_en' => $this->text(),
            'date_auction_ru' => $this->text(),
            'date_auction_uz' => $this->text(),
            'date_auction_en' => $this->text(),
            'payment_auction_ru' => $this->text(),
            'payment_auction_uz' => $this->text(),
            'payment_auction_en' => $this->text(),
            'payments_ru' => $this->text(),
            'payments_uz' => $this->text(),
            'payments_en' => $this->text(),
            'conditions_ru' => $this->text(),
            'conditions_uz' => $this->text(),
            'conditions_en' => $this->text(),
            'subjects_ru' => $this->text(),
            'subjects_uz' => $this->text(),
            'subjects_en' => $this->text(),
            'contacts' => $this->text(),
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
