<?php

namespace common\helpers;

use common\models\Feedback;
use common\models\Orders;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class OrdersHelper
{
    public static function statusList()
    {
        return [
            Orders::STATUS_WAIT => 'Wait',
            Orders::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Orders::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Orders::STATUS_ACTIVE:
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
