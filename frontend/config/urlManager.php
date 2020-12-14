<?php
/** @var array $params */
return [
    'class' => 'codemix\localeurls\UrlManager',
//    'hostInfo' => $params['frontendHostInfo'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
//    'enableStrictParsing' => true,
//    'languages' => ['uz', 'ru', 'en'],
//    'enableLanguageDetection' => false,
//    'enableDefaultLanguageUrlCode' => true,
//    'ignoreLanguageUrlPatterns' => [
//        // route pattern => url pattern
//    ],
    'rules' => [
        '' => 'site/index',
        '<_a:about|contact>' => 'site/<_a>',
        'signup' => 'auth/signup/request',
        'signup/<_a:[\w-]+>' => 'auth/signup/<_a>',
        'reset' => 'auth/reset/request',
        'reset/<_a:[\w-]+>' => 'auth/reset/<_a>',
        '<_a:login|logout>' => 'site/site/<_a>',

        'lang/<lang>' => 'site/lang',

        'page/<alias:[a-z-0-9_]+>' => 'site/page',
        'blog/<alias:[a-z-0-9_]+>' => 'blog/view',

        'cabinet' => 'cabinet/default/index',
        'cabinet/<_c:[\w\-]+>' => 'cabinet/<_c>/index',
        'cabinet/<_c:[\w\-]+>/<id:\d+>' => 'cabinet/<_c>/view',
        'cabinet/<_c:[\w\-]+>/<_a:[\w-]+>' => 'cabinet/<_c>/<_a>',
        'cabinet/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => 'cabinet/<_c>/<_a>',

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ],
];
