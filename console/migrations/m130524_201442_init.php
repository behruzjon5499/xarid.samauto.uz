<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'email' => $this->string()->unique(),
            'phone' => $this->string()->notNull(),
            'inn' => $this->string()->notNull(),
            'title_company' => $this->string()->notNull(),
            'email_company' => $this->string()->notNull(),
            'phone_company' => $this->string()->notNull(),
            'address_company' => $this->string()->notNull(),
            'sertifacation' => $this->string()->notNull(),
            'litsenziya' => $this->string()->notNull(),
            'zametka' => $this->string(),
            'check' => $this->string(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('user', [
            'first_name' => 'Admin',
            'last_name' => 'Administrator',
            'address' => 'Site',
            'phone' => '998973377733',
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
