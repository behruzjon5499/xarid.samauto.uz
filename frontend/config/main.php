<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
//        'common\bootstrap\SetUp',
//        'frontend\bootstrap\SetUp',
    ],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-coopered',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => ['login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'backendUrlManager' => require __DIR__ . '/../../backend/config/urlManager.php',
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                '' => 'site/index',

                'lang/<lang>' => 'site/lang',
//                '<_a:login|logout>' => 'site/site/<_a>',
                'get-history' => 'site/get-history',
                'get-partners' => 'site/get-partners',

                'get-user' => 'site/get-user',
                'search' => 'site/search',
//                'logout' => 'site/logout',
                '<action:(about|contacts|localization)>' => 'site/<action>',

//                'about/<action>' => 'site/<action>',
//                'about/<action>/<id>' => 'site/<action>',

                'get-workers' => 'site/get-workers',
                'get-vacancy' => 'site/get-vacancy',


                'localization/<link>/<sub_link>'=> 'site/localization-item',
                'get-localization' => 'site/get-localization',
                'search-localization' => 'site/search-localization',
                'get-companies' => 'site/get-companies',

                'symbols'=>'site/symbols',

                'news' => 'news/index',
                'news/archive' => 'news/archive',
                'news/get-archive' => 'news/get-archive', // ajax
                'news/<link>' => 'news/item',

                'actions' => '/site/actions',
                'action-item/<link>' => '/site/action-item',

                // new
                'services' => 'site/services',
                'services/warranty'=>'site/warranty',
                'services/centres'=>'site/centres',
                'services/spare-parts'=>'site/spare-parts',
                'services/faq' =>'site/services-faq',
                'localization/about' => 'site/localization-about',


                'dillers/region/<region_id>'=>'dillers/region',
                'dillers/<id>/service'=>'dillers/item',

                //'download-file/<id:\d+>' => 'site/download-file',

                'partnership'=> 'site/partnership',

                'products/<link>'=> 'products/item',
                'service/option/<item>/<link>'=> 'service/option',
                'service/<link>'=> 'service/list',
                'service/<link>/<item>'=> 'service/item',
                'send-comment' => 'products/send-comment',
                'send-phone' => 'site/send-phone',

                'projects' => 'projects/index', // список индивидуальных проектов
                'projects/<link>' => 'projects/item', // индивидуальный проект

                'sitemap' => 'site/sitemap',

                '<controller>/<action>/<id>' => '<controller>/<action>',
                '<controller>/<action>' => '<controller>/<action>',
                '<controller>' => '<controller>/index',
            ],
        ],
    ],

    'params' => $params,
];
