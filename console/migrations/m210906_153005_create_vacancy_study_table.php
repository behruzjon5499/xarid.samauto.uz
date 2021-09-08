<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy_study}}`.
 */
class m210906_153005_create_vacancy_study_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancy_study}}', [
            'id' => $this->primaryKey(),
            'vacancy_id' => $this->integer()->notNull(),
            'university' => $this->string()->notNull(),
            'end_year' => $this->integer(),
            'type' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacancy_study}}');
    }
}
