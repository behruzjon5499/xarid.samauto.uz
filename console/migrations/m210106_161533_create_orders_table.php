<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m210106_161533_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title_ru' => $this->text(),
            'title_uz' => $this->text(),
            'title_en' => $this->text(),
            'razdel' => $this->string(),
            'file' => $this->string(),
            'company_id' => $this->integer()->notNull(),
            'address' => $this->text(),
            'start_date' => $this->string()->notNull(),
            'end_date' => $this->string()->notNull(),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'predmet_order_ru' => $this->text(),
            'predmet_order_uz' => $this->text(),
            'predmet_order_en' => $this->text(),
            'delivery_order_ru' => $this->text(),
            'delivery_order_uz' => $this->text(),
            'delivery_order_en' => $this->text(),
            'payment_order_ru' => $this->text(),
            'payment_order_uz' => $this->text(),
            'payment_order_en' => $this->text(),
            'contacts_order_ru' => $this->text(),
            'contacts_order_uz' => $this->text(),
            'contacts_order_en' => $this->text(),
            'inn' => $this->string(),
            'mfo' => $this->string(),
            'account_number' => $this->string(),
            'bank' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('index-orders-company_id', 'orders', 'company_id');
        $this->addForeignKey('fkey-orders-company_id', 'orders', 'company_id', 'companies', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('index-orders-user_id', 'orders', 'user_id');
        $this->addForeignKey('fkey-orders-user_id', 'orders', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
