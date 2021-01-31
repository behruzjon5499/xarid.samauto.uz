<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%spiska}}`.
 */
class m210115_193016_create_spiska_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%spiska}}', [
            'id' => $this->primaryKey(),
            'nomer' => $this->string(),
            'table_number' => $this->string(),
            'full_name' => $this->string(),
            'inn' => $this->string()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%spiska}}');
    }
}
