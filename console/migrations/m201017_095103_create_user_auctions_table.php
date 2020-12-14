<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_auctions}}`.
 */
class m201017_095103_create_user_auctions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%user_auctions}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'price'=>$this->string()->notNull(),
            'file' => $this->string()->notNull(),
            'status'=>$this->string()->notNull()->defaultValue(0),
            'auction_id'=> $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('index-user_auctions-user_id', 'user_auctions', 'user_id');
        $this->addForeignKey('fkey-user_auctions-user_id', 'user_auctions', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('index-user_auctions-auction_id', 'user_auctions', 'auction_id');
        $this->addForeignKey('fkey-user_auctions-auction_id', 'user_auctions', 'auction_id', 'auctions', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_auctions}}');
    }
}
