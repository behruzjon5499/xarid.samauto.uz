<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy_work}}`.
 */
class m210906_165139_create_vacancy_work_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancy_work}}', [
            'id' => $this->primaryKey(),
            'vacancy_id' => $this->integer()->notNull(),
            'work' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacancy_work}}');
    }
}
