<?php

namespace common\helpers;

class LanguageHelper
{
    public static function get($className, $attributeName, $key = null)
    {
        $key = isset($key) ? $key : \Yii::$app->language;

        return $className[$attributeName . '_' . $key];
    }
}
