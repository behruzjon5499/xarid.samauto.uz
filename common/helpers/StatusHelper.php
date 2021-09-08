<?php

namespace common\helpers;

use common\models\Vacancy;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class StatusHelper
{
    public static function statusList()
    {
        return [
            Vacancy::STATUS_WAIT => 'Wait',
            Vacancy::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    /**
     * @throws \Exception
     */
    public static function statusLabel($status)
    {
        switch ($status) {
            case Vacancy::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Vacancy::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }

    public static function nationList()
    {
        return [
            Vacancy::UZBEK => 'Uzbek',
            Vacancy::RUSSIAN => 'Russian',
            Vacancy::ENGLISH => 'English',
        ];
    }
}
