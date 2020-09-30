<?php

namespace common\bootstrap;

use yii\base\BootstrapInterface;
use yii\caching\Cache;
use yii\mail\MailerInterface;
use yii\rbac\ManagerInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });
        $container->setSingleton(Cache::class, function () use ($app) {
            return $app->cache;
        });
        $container->setSingleton(ManagerInterface::class, function () use ($app) {
            return $app->authManager;
        });
    }
}
