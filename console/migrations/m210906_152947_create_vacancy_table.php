<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy}}`.
 */
class m210906_152947_create_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%vacancy}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(250)->notNull(),
            'birth_day' => $this->date()->notNull(),
            'nation' => $this->string(100),
            'phone' => $this->integer(),
            'email' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacancy}}');
    }
}
