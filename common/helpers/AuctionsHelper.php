<?php

namespace common\helpers;

use common\models\Auctions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class AuctionsHelper
{
    public static function statusList()
    {
        return [
            Auctions::STATUS_WAIT => 'Wait',
            Auctions::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Auctions::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Auctions::STATUS_ACTIVE:
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
