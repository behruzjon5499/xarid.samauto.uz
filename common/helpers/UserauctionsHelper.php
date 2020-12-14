<?php

namespace common\helpers;

use common\models\UserAuctions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class UserauctionsHelper
{
    public static function statusList()
    {
        return [
            UserAuctions::STATUS_WAIT => 'Wait',
            UserAuctions::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case UserAuctions::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case UserAuctions::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}
