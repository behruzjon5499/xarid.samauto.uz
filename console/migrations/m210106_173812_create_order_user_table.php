<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_user}}`.
 */
class m210106_173812_create_order_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%order_user}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'order_id'=> $this->integer()->notNull(),
            'price'=>$this->string()->notNull(),
            'ddq' => $this->string()->notNull(),
            'file' => $this->string()->notNull(),
            'status'=>$this->string()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('index-order_user-user_id', 'order_user', 'user_id');
        $this->addForeignKey('fkey-order_user-user_id', 'order_user', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('index-order_user-order_id', 'order_user', 'order_id');
        $this->addForeignKey('fkey-order_user-order_id', 'order_user', 'order_id', 'orders', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_user}}');
    }
}
