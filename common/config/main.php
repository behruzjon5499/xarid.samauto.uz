<?php
return [
    'timezone' => 'Asia/Tashkent',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        /*'food' => [
            'class' => 'backend\modules\food',
        ],*/
//        'i18n',
//        'FillContent' => [ //  модуль заполнения контета
//            'class' => 'app\modules\FillContent',
//        ],
    ],
    'components' => [
        'db' => require(__DIR__.'/db.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => Yii::getAlias('@common') . '/cache', // общий кеш для backend / frontend в папке frontend/web/cache
        ],
        /*'urlManager' => [
		    'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
         ],
        ],*/
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    //'js' => ['js/jquery_1.11.3.js'] // тут путь до Вашего экземпляра jquery
                    'js' => ['js/jquery-3.2.1.min.js'], // тут путь до Вашего экземпляра jquery
                ],
            ],
        ],
    ],
    'language'=>'ru-RU',
];
