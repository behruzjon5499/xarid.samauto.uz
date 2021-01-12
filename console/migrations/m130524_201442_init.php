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
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->unique()->notNull(),
            'phone' => $this->string()->notNull(),
            'inn' => $this->string()->notNull(),
            'title_company' => $this->string()->notNull(),
            'email_company' => $this->string()->notNull(),
            'phone_company' => $this->string()->notNull(),
            'address_company' => $this->text()->notNull(),
            'sertifacation' => $this->string()->notNull(),
            'litsenziya' => $this->string(),
            'role' => $this->integer()->notNull()->defaultValue(0),
            'zametka' => $this->string(),
            'check' => $this->string()->notNull(),
            'again_password' => $this->string(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('user', [
            'phone' => '909515499',
            'inn' => 'admin',
            'title_company' => '909515499',
            'email_company' => 'admin',
            'phone_company' => '909515499',
            'address_company' => 'admin',
            'sertifacation' => '909515499',
            'litsenziya' => 'admin',
            'role' => '1',
            'check' => '909515499',
            'username' => 'admin',
            'status' => '10',
            'email' => 'behruztoxirov909515499@gmail.com',
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
