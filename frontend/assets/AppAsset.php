<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/zoomslider.css',
        'css/main.css',
        'css/samauto.css',
//        'css/site.css',

    ];
    public $js = [
        'js/modernizr-2.6.2.min.js',
        'js/OverlayScrollbars.js',
        'js/jquery.zoomslider.min.js',
        'js/samauto.js',
        'js/main.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
