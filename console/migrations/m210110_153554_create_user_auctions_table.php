<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_auctions}}`.
 */
class m210110_153554_create_user_auctions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%user_auctions}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string()->notNull(),
            'auction_id' => $this->string()->notNull(),
            'price' =>$this->string()->notNull(),
            'file'=> $this->string()->notNull(),
            'status'=> $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_auctions}}');
    }
}
