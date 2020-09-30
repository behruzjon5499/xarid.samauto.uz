<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_and_links}}`.
 */
class m200929_072455_create_site_and_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%site_and_links}}', [
            'id' => $this->primaryKey(),
            'link_id' => $this->integer()->notNull(),
            'url' => $this->string()->notNull()
        ], $tableOptions);

        $this->createIndex('index-site_and_links-link_id', 'site_and_links', 'link_id');
        $this->addForeignKey('fkey-site_and_links-link_id', 'site_and_links', 'link_id', 'links', 'id', 'RESTRICT', 'RESTRICT');
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_and_links}}');
    }
}
