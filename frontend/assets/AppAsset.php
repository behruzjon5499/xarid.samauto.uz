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
        '/dist/zoomslider.css',

        '/css/samauto.css',
        '/css/main.css',
        'css/site.css',

    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        '/js/modernizr-2.6.2.min.js',
        '/js/OverlayScrollbars.js',
        '/dist/jquery.zoomslider.min.js',
        '/js/SamAuto.js',
        '/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
