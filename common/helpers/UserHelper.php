<?php

namespace common\helpers;

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class UserHelper
{
    public static function statusList()
    {
        return [
            User::ADMIN => 'Admin',
            User::MANAGER => 'Manager',
            User::USER => 'User',
            User::GUEST => 'Guest',

        ];
    }

    public static function statusName($role)
    {
        return ArrayHelper::getValue(self::statusList(), $role);
    }

    public static function statusLabel($role)
    {
        switch ($role) {
            case User::USER:
                $class = 'label label-danger';
                break;
            case User::MANAGER:
                $class = 'label label-info';
                break;
            case User::ADMIN:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $role), [
            'class' => $class,
        ]);
    }
}
