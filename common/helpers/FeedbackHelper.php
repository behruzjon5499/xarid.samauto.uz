<?php

namespace common\helpers;

use common\models\Feedback;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class FeedbackHelper
{
    public static function statusList()
    {
        return [
            Feedback::STATUS_WAIT => 'Wait',
            Feedback::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Feedback::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Feedback::STATUS_ACTIVE:
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
