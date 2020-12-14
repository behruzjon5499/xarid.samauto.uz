<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_contacts}}`.
 */
class m201021_095907_create_site_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%site_contacts}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
            'telegram' => $this->string(),
            'instagram' => $this->string(),
            'facebook' => $this->string(),
            'youtube' => $this->string(),
            'rss' => $this->string(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_contacts}}');
    }
}
