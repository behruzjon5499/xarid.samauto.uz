<?php

namespace common\auth;

use yii\web\IdentityInterface;

class Identity implements IdentityInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function findIdentity($id)
    {
        $user = self::getRepository()->findActiveById($id);
        return $user ? new self($user) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return !empty($data['user_id']) ? static::findIdentity($data['user_id']) : null;
    }

    public function getId()
    {
        return $this->user->id;
    }
    public function username()
    {
        return $this->user->username;
    }
    public function getAuthKey()
    {
        return $this->user->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

//    private static function getRepository()
//    {
//        return \Yii::$container->get(UserReadRepository::class);
//    }
}
