<?php

/* @var $this \yii\web\View */

/* @var $content string */
/* @var $contacts SiteContacts */
use common\helpers\LangHelper;
use common\models\SiteContacts;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$contacts = SiteContacts::find()->where(['id'=> 1])->one();

$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';

$link = 'link_' . $lang;
$title = 'title_' . $lang;
$text = 'text_' . $lang;
$name = 'name_' . $lang;
$descr = 'descr_' . $lang;
$link = 'link_' . $lang;
$material = 'material_' . $lang;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody()
?>
<?php
$user  = \common\models\User::find()->where(['id'=>Yii::$app->user->id])->one();
?>

<div class="fullpage_header flex_row_beet_cen page_header bgWhite" style="flex-direction: column;">
    <div class="nav__2">
        <div class="top-navbar h-60">
            <div class="d-flex" style="align-items: center;">
                <a href="<?= yii\helpers\Url::to(['site/index']) ?>" class="logo preload">
                    <h4 style="color: #C62829;padding-left: 10px;font-weight: 600">Xarid.SamAuto.uz</h4>
                </a>
                <div class="d-flex">
                    <a href="tel:+998900000000" class="phone-item under-hover preload lang-mob-hide"><i
                                class="fa fa-phone"></i><span><?=  $contacts->phone?></span> </a>
                    <a href="<?= yii\helpers\Url::to(['feedback/create']) ?>" class="phone-item under-hover preload lang-mob-hide"><i
                                class="fa fa-comments-o"></i><span><?= LangHelper::t("Задавать вопросы?", "Задавать вопросы?", "Задавать вопросы?"); ?></span>
                    </a>
                </div>
            </div>
            <div class="d-flex" style="flex: 1;justify-content: flex-end;">
                <div class="lang ">
                    <a href="/lang/ru" class="under-hover preload">RU</a>
                    <div class="drop">
                        <div>
                            <a href="/lang/uz" class="under-hover preload">UZ</a>
                            <a href="/lang/en" class="under-hover preload">EN</a>
                        </div>
                    </div>
                </div>
                <div class="lang lang-mob-show">
                    <div class="drop">
                        <div>
                            <a href="/lang/ru" class="under-hover preload">RU</a>
                            <a href="/lang/uz" class="under-hover preload">UZ</a>
                            <a href="/lang/en" class="under-hover preload">EN</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="position: relative;width: 240px;top: -20px">
                <?php if (Yii::$app->user->isGuest) {
                    echo '<div class="sing-in">
                    <a href="'. yii\helpers\Url::to(['site/login']) .'">
                        <img src="/img/login-1.png">
                    </a>
                </div>';
                } else {
                    echo '    <div class="sing-out">
                    <img src="/img/user-alt-512.png">
                    <div>
                        <p>'.  \Yii::$app->user->identity->username.'</p>
                        <a>AO "UzAuto Motors"</a>
                    </div>
                    <ul class="nav-cog">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user" aria-hidden="true"></i>' . LangHelper::t("Профиль", "Профиль", "Профиль") .'  </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-cog" aria-hidden="true"></i>'.  LangHelper::t("Изменить пароль", "Изменить пароль", "Изменить пароль") . '</a>
                        </li>
                        <li> ' . Html::a(   'Sign out',['/site/logout'],['data-method' => 'post', 'class' => 'btn btn-default btn-flat'])  . '</li>
                               
                    </ul>
                </div>';
                } ?>


            </div>
        </div>
    </div>
    <div class="flex_row_beet_cen" style="padding-top: 20px; width: 100%;">
        <div class="leftBox flex_row_beet_cen">
            <div style="display: flex;">
                <div class="menuBar lang-mob-show">
                    <span class="sp1"></span>
                    <span class="sp2"></span>
                    <span class="sp3"></span>
                </div>
                <a href="<?= yii\helpers\Url::to(['site/index']) ?>" class="logo preload">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="10.3607mm" height="2.0628mm"
                         version="1.1"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 859.19 171.06"
                    >
                <g>
                    <metadata/>
                    <path d="M99.27 118.81c0,-16.93 -4.54,-34.54 -36.77,-49.05 -14.03,-6.29 -22.45,-12.29 -22.45,-24.38 0,-11.8 6.97,-19.06 20.03,-19.06 10.16,0 19.06,3.58 24.87,7.26l8.23 -23.9c-7.94,-5.32 -21,-9.68 -38.89,-9.68 -32.42,0 -52.63,23.22 -52.63,51.28 0,16.15 7.26,34.35 33.09,45.86 16.93,7.45 23.22,14.03 23.22,24.67 0,11.8 -8.42,19.84 -22.26,19.84 -11.61,0 -21.48,-4.06 -26.8,-7.74l-8.9 27.28c9.39,6.29 22.93,9.87 43.54,9.87 32.9,0 55.83,-22.26 55.83,-52.24l-0.09 -0.01zm113.21 42.58l0 -77.79c0,-35.32 -21.77,-47.6 -51.28,-47.6 -22.93,0 -39.86,6 -49.05,9.87l8.23 21.48c8.42,-3.87 21.29,-7.94 33.87,-7.94 13.74,0 22.93,3.87 22.93,17.41l0 6c-39.18,3.58 -72.76,13.54 -72.76,47.12 0,27.09 19.35,41.12 56.99,41.12 22.45,0 40.15,-3.87 50.99,-9.68l0.09 0.01zm-35.32 -13.74c-3.38,1.64 -8.23,2.61 -13.74,2.61 -14.99,0 -23.71,-6.48 -23.71,-21.77 0,-20.8 14.7,-26.12 37.44,-28.25l0 47.41 0.01 0zm225.73 23.42l0 -91.34c0,-22.93 -15.96,-41.31 -46.93,-41.31 -21.48,0 -34.83,6 -43.06,13.06 -7.45,-7.26 -19.84,-13.06 -41.31,-13.06 -22.74,0 -38.22,3.09 -52.63,9.68l0 122.97 37.73 0 0 -106.53c4.54,-1.74 8.52,-2.42 15.19,-2.42 13.06,0 20.32,6.78 20.32,17.12l0 91.82 37.73 0 0 -102.66c4.35,-4.35 9.87,-6.29 16.44,-6.29 13.06,0 18.87,7.74 18.87,17.61l0 91.34 37.73 0 -0.08 0.01zm151.62 0l-53.89 -166.23 -38.22 0 -54.09 166.23 35.03 0 10.64 -35.51 50.02 0 10.16 35.51 40.34 0 0.01 0zm-55.83 -57.96l-38.89 0 15.48 -54.19c3.38,-11.8 4.35,-20.03 4.35,-20.03l0.48 0c0,0 0.68,8.42 3.87,20.03l14.7 54.19zm165.36 47.89l0 -122.49 -37.73 0 0 104.11c-4.06,2.13 -8.9,3.09 -15.67,3.09 -12.77,0 -17.9,-7.74 -17.9,-17.12l0 -90.18 -37.73 0 0 87.46c0,31.45 17.9,45.19 54.57,45.19 24.38,0 42.29,-4.16 54.38,-10.16l0.09 0.1zm79.34 6l0 -23.22c-3.09,0.97 -4.83,1.45 -7.94,1.45 -8.42,0 -12.09,-5.32 -12.09,-15.19l0 -67.15 20.03 0 0 -24.38 -20.03 0 0 -37.44 -37.73 9.68 0 27.77 -14.22 0 0 24.38 14.22 0 0 70.05c0,20.03 11.8,37.73 39.18,37.73 8.71,0 15.48,-2.13 18.58,-3.58l0 -0.1zm115.82 -63.57c0,-38.89 -19.84,-67.44 -57.76,-67.44 -37.44,0 -57.28,28.54 -57.28,67.44 0,38.89 19.84,67.64 57.47,67.64 37.73,0 57.47,-28.73 57.47,-67.64l0.1 0zm-37.44 -0.48c0,23.42 -3.38,42.58 -20.03,42.58 -16.44,0 -20.03,-19.06 -20.03,-42.58 0,-23.22 3.38,-43.54 20.03,-43.54 16.64,0 20.03,20.32 20.03,43.54z"/>
                </g>
              </svg>
                </a>
            </div>
            <div class="downloads">
                <a href="<?= yii\helpers\Url::to(['site/index']) ?>" class="under-hover">
                    <?= LangHelper::t("ГЛАВНАЯ", "BOSH SAHIFA", "ГЛАВНАЯ"); ?>
                </a>
                <a href="<?= yii\helpers\Url::to(['auctions/index']) ?>"
                   class="under-hover"><?= LangHelper::t("Конкурсы на продажи", "Конкурсы на продажи", "Конкурсы на продажи"); ?></a>

                <a href="<?= yii\helpers\Url::to(['statistics/index']) ?>"
                   class="under-hover"><?= LangHelper::t("СТАТИСТИКА", "СТАТИСТИКА", "СТАТИСТИКА"); ?></a>
                <!-- <a href="company.html"  class="under-hover">КОМПАНИИ</a> -->
                <a href="<?= yii\helpers\Url::to(['question/index']) ?>"
                   class="under-hover">   <?= LangHelper::t("ЧАВО", "ЧАВО", "ЧАВО"); ?></a>
                <div class="nav-dropdown">
                    <a class="v-mid">
                        <?= LangHelper::t("ДОКУМЕНТАЦИЯ", "ДОКУМЕНТАЦИЯ", "ДОКУМЕНТАЦИЯ"); ?>
                    </a>
                    <ul class="nav-dropdown-content">
                        <li>
                            <a href="<?= yii\helpers\Url::to(['document/index']) ?>"> <?= LangHelper::t("Инструкция", "Инструкция", "Инструкция"); ?>  </a>
                        </li>
                        <li>
                            <a href="<?= yii\helpers\Url::to(['document/index']) ?>"><?= LangHelper::t("Положение", "Положение", "Положение"); ?> </a>
                        </li>
                        <li><a href="<?= yii\helpers\Url::to(['document/index']) ?>"
                               target="_blank"><?= LangHelper::t("Пром отход", "Пром отход", "Пром отход"); ?> </a></li>
                    </ul>
                </div>
                <a href="<?= yii\helpers\Url::to(['site/contact']) ?>"
                   class="under-hover"><?= LangHelper::t("КОНТАКТЫ", "BOG'LANISHLAR", "CONTACS"); ?> </a>
                <div class="nav-dropdown">
                    <a class="v-mid">
                        <?= LangHelper::t("ТЕЛЕГРАМ", "TELEGRAM", "ТЕЛЕГРАМ"); ?>
                    </a>
                    <ul class="nav-dropdown-content">
                        <li><a href="#" target="_blank"><?= LangHelper::t("Закупки", "Закупки", "Закупки"); ?></a></li>
                        <li><a href="#"
                               target="_blank"><?= LangHelper::t("Конкурсы на продажи", "Конкурсы на продажи", "Конкурсы на продажи"); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rightBox flex_row_end_cen">
            <div class="search sp-search">
                <!-- style="margin-right: 0px;" если один-->
                <form action="">
                    <input type="text" placeholder="Поиск..." style="width: 120px"/>
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="2.3098mm" height="2.28mm"
                         version="1.1"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 17.24 17.02"
                    >
                <!-- margin-right:0px !important; если один-->
                        <g>
                            <metadata/>
                            <g>
                                <path d="M-0 6.9c0,1.33 0.14,2.27 0.7,3.37 0.46,0.91 1.1,1.82 1.92,2.45 0.97,0.75 1.73,1.14 2.96,1.45 0.27,0.07 0.46,0.09 0.77,0.13 1.54,0.21 2.85,-0.13 4.19,-0.8l0.9 -0.52 3.01 3.71c0.72,0.76 1.11,0.06 1.83,-0.65 0.21,-0.22 0.98,-0.87 0.98,-1.15 0,-0.62 -0.86,-1.1 -1.39,-1.56 -0.65,-0.57 -1.44,-1.17 -2.13,-1.75 -0.09,-0.08 -0.17,-0.13 -0.27,-0.21 -0.13,-0.11 -0.12,-0.12 -0.28,-0.21 0.04,-0.15 0.12,-0.26 0.2,-0.39 0.09,-0.14 0.14,-0.25 0.21,-0.39 0.91,-1.82 0.97,-3.74 0.32,-5.66 -0.08,-0.25 -0.17,-0.4 -0.26,-0.63l-0.3 -0.56c-0.06,-0.1 -0.12,-0.17 -0.18,-0.27l-0.36 -0.5c-0.15,-0.21 -0.65,-0.75 -0.85,-0.91 -0.85,-0.65 -0.8,-0.71 -1.87,-1.22 -0.37,-0.18 -0.89,-0.33 -1.32,-0.44 -1.44,-0.35 -3.15,-0.19 -4.48,0.41 -1.61,0.72 -2.6,1.72 -3.44,3.17l-0.41 0.89c-0.08,0.22 -0.15,0.45 -0.22,0.68 -0.12,0.41 -0.23,1.05 -0.23,1.56zm7.16 -5.46c3.14,0 5.68,2.54 5.68,5.68 0,3.13 -2.54,5.68 -5.68,5.68 -3.14,0 -5.68,-2.54 -5.68,-5.68 0,-3.14 2.54,-5.68 5.68,-5.68z"/>
                                <path d="M3.68 7.82c-0.01,-0.47 0.01,-0.78 0.14,-1.23 0.55,-1.93 1.81,-3.01 3.79,-3.23 0.27,0 0.43,-0.03 0.49,-0.09 0.36,-0.61 0.09,-0.9 -0.81,-0.88 -2.41,0.03 -3.94,1.31 -4.6,3.84 -0.09,0.33 -0.23,0.97 -0.08,1.36 0.11,0.29 0.63,0.48 0.89,0.42 0.1,-0.02 0.16,-0.08 0.18,-0.19z"/>
                            </g>
                        </g>
              </svg>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="fullpage_menu">
    <ul>
        <li class="overlayClose"></li>
        <li style="transition-delay: 0s;"><a href="<?= yii\helpers\Url::to(['site/index']) ?>"
                                             class="preload">    <?= LangHelper::t("ГЛАВНАЯ", "BOSH SAHIFA", "ГЛАВНАЯ"); ?></a>
        </li>
        <li style="transition-delay: 0s;"><a
                    href="<?= yii\helpers\Url::to(['auction/index']) ?>"> <?= LangHelper::t("Конкурсы на продажи", "Конкурсы на продажи", "Конкурсы на продажи"); ?></a>
        </li>
        <!-- <li style="transition-delay: 0.1s;"><a href="company.html" class="preload">КОМПАНИИ</a></li> -->
        <li style="transition-delay: 0.2s;"><a href="faq.html"
                                               class="preload"> <?= LangHelper::t("ЧАВО", "ЧАВО", "ЧАВО"); ?></a></li>
        <li style="transition-delay: 0.2s;"><a
                    href="<?= yii\helpers\Url::to(['document/index']) ?>"><?= LangHelper::t("Инструкция", "Инструкция", "Инструкция"); ?></a></li>
        <li style="transition-delay: 0.2s;"><a
                    href="posture.html"><?= LangHelper::t("Положение", "Положение", "Положение"); ?></a></li>
        <li style="transition-delay: 0.2s;"><a href="#"
                                               target="_blank"><?= LangHelper::t("Пром отход", "Пром отход", "Пром отход"); ?></a>
        </li>
        <li style="transition-delay: 0.3s;"><a href="<?= yii\helpers\Url::to(['site/contact']) ?>"
                                               class="preload"><?= LangHelper::t("КОНТАКТЫ", "BOG'LANISHLAR", "CONTACTS"); ?></a>
        </li>
        <li style="transition-delay: 0.3s;"><a href="#" target="_blank"><i class="fa fa-telegram"
                                                                           style="margin-right: 20px;"></i><?= LangHelper::t("Закупки", "Закупки", "Закупки"); ?>
            </a></li>
        <li style="transition-delay: 0.3s;"><a href="#" target="_blank"><i class="fa fa-telegram"
                                                                           style="margin-right: 20px;"></i><?= LangHelper::t("Конкурсы на продажи", "Конкурсы на продажи", "Конкурсы на продажи"); ?>
            </a></li>
    </ul>
</div>

<div class="wrap">

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>

</div>

<div class="main-footer">
    <div class="medium_container">
        <div class="contactPage">
            <ul>
                <li class="ul_title"><a href="index.html"><?= LangHelper::t("Главная", "Bosh Sahifa", "Главная"); ?></a>
                </li>
                <li><a href="#company.html"><?= LangHelper::t("Компании", "Kompaniya", "Company"); ?></a></li>
            </ul>
            <ul>
                <li class="ul_title"><a href="faq.html"><?= LangHelper::t("FAQ", "FAQ", "FAQ"); ?></a></li>
                <li>
                    <a href="instructions.html"><?= LangHelper::t("ДОКУМЕНТАЦИЯ", "ДОКУМЕНТАЦИЯ", "ДОКУМЕНТАЦИЯ"); ?></a>
                </li>
            </ul>
            <ul>
                <li class="ul_title"><a><?= LangHelper::t("Cоц. сети", "Cоц. сети", "Cоц. сети"); ?></a></li>
                <div class="social-footer">
                    <a href="<?= $contacts->telegram ?>" target="_blank">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve">
                  <g>
                      <path d="M5.299,144.645l69.126,25.8l26.756,86.047c1.712,5.511,8.451,7.548,12.924,3.891l38.532-31.412
                      c4.039-3.291,9.792-3.455,14.013-0.391l69.498,50.457c4.785,3.478,11.564,0.856,12.764-4.926L299.823,29.22
                      c1.31-6.316-4.896-11.585-10.91-9.259L5.218,129.402C-1.783,132.102-1.722,142.014,5.299,144.645z M96.869,156.711l135.098-83.207
                      c2.428-1.491,4.926,1.792,2.841,3.726L123.313,180.87c-3.919,3.648-6.447,8.53-7.163,13.829l-3.798,28.146
                      c-0.503,3.758-5.782,4.131-6.819,0.494l-14.607-51.325C89.253,166.16,91.691,159.907,96.869,156.711z"/>
                  </g>
                </svg>
                    </a>
                    <a href="<?= $contacts->instagram ?>" target="_blank">
                        <svg viewBox="-21 -21 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg">
                            <path d="m0 132.976562v374.046876c0 73.441406 59.535156 132.976562 132.976562 132.976562h374.046876c73.441406 0 132.976562-59.535156 132.976562-132.976562v-374.046876c0-73.441406-59.535156-132.976562-132.976562-132.976562h-374.046876c-73.441406 0-132.976562 59.535156-132.976562 132.976562zm387.792969 368.359376c-157.855469 54.464843-303.59375-91.273438-249.128907-249.128907 18.351563-53.203125 60.335938-95.191406 113.539063-113.542969 157.859375-54.464843 303.597656 91.273438 249.132813 249.132813-18.351563 53.203125-60.335938 95.1875-113.542969 113.539063zm154.28125-374.859376c-2.511719 13.152344-13.394531 20.804688-24.652344 20.804688-6.851563 0-13.835937-2.828125-19.183594-8.964844-.472656-.542968-.914062-1.125-1.304687-1.730468-5.519532-8.4375-5.691406-18.460938-1-26.589844 3.320312-5.753906 8.679687-9.863282 15.097656-11.582032 6.410156-1.726562 13.113281-.839843 18.859375 2.484376 8.132813 4.6875 12.992187 13.457031 12.4375 23.511718-.039063.6875-.121094 1.386719-.253906 2.066406zm0 0"/>
                            <path d="m320 164.523438c-85.734375 0-155.476562 69.742187-155.476562 155.476562s69.742187 155.476562 155.476562 155.476562 155.476562-69.742187 155.476562-155.476562-69.742187-155.476562-155.476562-155.476562zm0 0"/>
                        </svg>
                    </a>
                    <a href="<?= $contacts->facebook ?>" target="_blank">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="96.124px" height="96.123px" viewBox="0 0 96.124 96.123"
                             style="enable-background:new 0 0 96.124 96.123;"
                             xml:space="preserve">
                  <g>
                      <path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
                      c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
                      c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
                      c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
                  </g>
                </svg>
                    </a>
                    <a href="<?= $contacts->youtube?>" target="_blank">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="90px" height="90px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;"
                             xml:space="preserve">
                  <g>
                      <path d="M70.939,65.832H66l0.023-2.869c0-1.275,1.047-2.318,2.326-2.318h0.315c1.282,0,2.332,1.043,2.332,2.318
                      L70.939,65.832z M52.413,59.684c-1.253,0-2.278,0.842-2.278,1.873V75.51c0,1.029,1.025,1.869,2.278,1.869
                      c1.258,0,2.284-0.84,2.284-1.869V61.557C54.697,60.525,53.671,59.684,52.413,59.684z M82.5,51.879v26.544
                      C82.5,84.79,76.979,90,70.23,90H19.771C13.02,90,7.5,84.79,7.5,78.423V51.879c0-6.367,5.52-11.578,12.271-11.578H70.23
                      C76.979,40.301,82.5,45.512,82.5,51.879z M23.137,81.305l-0.004-27.961l6.255,0.002v-4.143l-16.674-0.025v4.073l5.205,0.015v28.039
                      H23.137z M41.887,57.509h-5.215v14.931c0,2.16,0.131,3.24-0.008,3.621c-0.424,1.158-2.33,2.388-3.073,0.125
                      c-0.126-0.396-0.015-1.591-0.017-3.643l-0.021-15.034h-5.186l0.016,14.798c0.004,2.268-0.051,3.959,0.018,4.729
                      c0.127,1.357,0.082,2.939,1.341,3.843c2.346,1.69,6.843-0.252,7.968-2.668l-0.01,3.083l4.188,0.005L41.887,57.509L41.887,57.509z
                      M58.57,74.607L58.559,62.18c-0.004-4.736-3.547-7.572-8.356-3.74l0.021-9.239l-5.209,0.008l-0.025,31.89l4.284-0.062l0.39-1.986
                      C55.137,84.072,58.578,80.631,58.57,74.607z M74.891,72.96l-3.91,0.021c-0.002,0.155-0.008,0.334-0.01,0.529v2.182
                      c0,1.168-0.965,2.119-2.137,2.119h-0.766c-1.174,0-2.139-0.951-2.139-2.119V75.45v-2.4v-3.097h8.954v-3.37
                      c0-2.463-0.063-4.925-0.267-6.333c-0.641-4.454-6.893-5.161-10.051-2.881c-0.991,0.712-1.748,1.665-2.188,2.945
                      c-0.444,1.281-0.665,3.031-0.665,5.254v7.41C61.714,85.296,76.676,83.555,74.891,72.96z M54.833,32.732
                      c0.269,0.654,0.687,1.184,1.254,1.584c0.56,0.394,1.276,0.592,2.134,0.592c0.752,0,1.418-0.203,1.998-0.622
                      c0.578-0.417,1.065-1.04,1.463-1.871l-0.099,2.046h5.813V9.74H62.82v19.24c0,1.042-0.858,1.895-1.907,1.895
                      c-1.043,0-1.904-0.853-1.904-1.895V9.74h-4.776v16.674c0,2.124,0.039,3.54,0.102,4.258C54.4,31.385,54.564,32.069,54.833,32.732z
                      M37.217,18.77c0-2.373,0.198-4.226,0.591-5.562c0.396-1.331,1.107-2.401,2.137-3.208c1.027-0.811,2.342-1.217,3.941-1.217
                      c1.345,0,2.497,0.264,3.459,0.781c0.967,0.52,1.713,1.195,2.23,2.028c0.527,0.836,0.885,1.695,1.076,2.574
                      c0.195,0.891,0.291,2.235,0.291,4.048v6.252c0,2.293-0.092,3.98-0.271,5.051c-0.177,1.074-0.557,2.07-1.146,3.004
                      c-0.58,0.924-1.329,1.615-2.237,2.056c-0.918,0.445-1.968,0.663-3.154,0.663c-1.325,0-2.441-0.183-3.361-0.565
                      c-0.923-0.38-1.636-0.953-2.144-1.714c-0.513-0.762-0.874-1.69-1.092-2.772c-0.219-1.081-0.323-2.707-0.323-4.874L37.217,18.77
                      L37.217,18.77z M41.77,28.59c0,1.4,1.042,2.543,2.311,2.543c1.27,0,2.308-1.143,2.308-2.543V15.43c0-1.398-1.038-2.541-2.308-2.541
                      c-1.269,0-2.311,1.143-2.311,2.541V28.59z M25.682,35.235h5.484l0.006-18.96l6.48-16.242h-5.998l-3.445,12.064L24.715,0h-5.936
                      l6.894,16.284L25.682,35.235z"/>
                  </g>
                </svg>
                    </a>
                    <a href="<?php if (!empty($contacts->rss)){$contacts->rss;}?>">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             viewBox="0 0 485 485" style="enable-background:new 0 0 485 485;" xml:space="preserve">
                  <g>
                      <path d="M339.708,400H400c-0.035-86.835-35.341-165.515-92.369-222.578C250.567,120.359,171.953,85.035,85.136,85v60.121
                      C225.512,145.226,339.603,259.505,339.708,400z"/>
                      <path d="M232.451,399.899c0.017,0,0.017,0.101,0.017,0.101h60.397c-0.052-57.304-23.345-109.187-60.996-146.869
                      c-37.664-37.686-89.534-60.979-146.833-61.014v60.139c39.27,0.035,76.409,15.452,104.195,43.291
                      C217.02,323.302,232.385,360.489,232.451,399.899z"/>
                      <path d="M126.821,399.606c11.567,0,21.958-4.629,29.614-12.219c7.586-7.604,12.237-17.925,12.272-29.426
                      c-0.035-11.502-4.686-21.844-12.307-29.466c-7.621-7.586-18.012-12.254-29.579-12.254c-11.555,0-21.928,4.668-29.549,12.237
                      C89.681,336.086,85,346.459,85,357.961c0,11.502,4.681,21.84,12.272,29.426C104.876,394.96,115.266,399.606,126.821,399.606z"/>
                      <path d="M0,0v485h485V0H0z M455,455H30V30h425V455z"/>
                  </g>
                </svg>
                    </a>
                </div>
            </ul>
            <div class="box">
                <div class="title"><?= LangHelper::t("САМАРКАНД", "SAMARQAND", "SAMARKAND"); ?></div>
                <a onclick="mapPanTo(39.648095,66.910189); return false;"
                   class="address"></a>
                <div class="icon-text">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.944mm" height="1.9439mm"
                         version="1.1"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 3.23 3.23">
                <g>
                    <metadata></metadata>
                    <g>
                        <path d="M1.34 1.86c0,0.05 0.01,0.09 0.01,0.13 -0,0.05 -0.02,0.04 -0.07,0.06 -0.03,0.01 -0.06,0.02 -0.1,0.03 -0.01,0 -0.02,0 -0.02,0.01 -0.01,0 -0.02,0 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.07,0 -0,-0 -0,-0.01 -0.01,-0.01 -0.02,-0.02 -0.04,-0.05 -0.05,-0.08 -0.01,-0.03 -0,-0.06 0,-0.09 0.01,-0.02 0.01,-0.03 0.02,-0.05 0,-0.01 0.01,-0.02 0.01,-0.02 0.01,-0.02 0.01,-0.03 0.03,-0.04l0.02 -0.02c0,-0 0.01,-0 0.01,-0.01 0.01,-0.01 0.02,-0.02 0.04,-0.03 0.04,-0.02 0.14,-0.07 0.18,-0.08 0.19,-0.06 0.4,-0.04 0.6,0.01 0.02,0 0.03,0.01 0.05,0.01 0.05,0.02 0.08,0.03 0.13,0.06 0.03,0.02 0.05,0.03 0.06,0.06 0.02,0.02 0.04,0.05 0.04,0.08 0.02,0.05 0.03,0.1 0.01,0.15 -0,0.01 -0.01,0.01 -0.01,0.02 -0.01,0.02 -0.03,0.03 -0.04,0.04 -0,0 -0,0 -0.01,0.01 -0.04,0.03 -0.04,0.01 -0.1,-0.02 -0.01,-0 -0.02,-0.01 -0.04,-0.02l-0.04 -0.02c-0.03,-0.01 -0.09,-0.04 -0.1,-0.06 -0.01,-0.03 -0.01,-0.06 -0.01,-0.09 0,-0.06 -0,-0.06 -0.07,-0.08 -0.11,-0.03 -0.23,-0.04 -0.35,-0.01 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.02,0 -0.04,0.01 -0.04,0.04zm-0.27 -1.07c0,-0.02 0.02,-0.03 0.03,-0.03l1.02 0c0.02,0 0.03,0.02 0.03,0.03l0 0.64 -1.08 0 0 -0.64zm-0.09 -0.01l0 0.65c-0.07,0 -0.12,0 -0.18,0.04 -0.01,0.01 -0.02,0.02 -0.04,0.03 -0.02,0.02 -0.04,0.04 -0.05,0.08 -0.01,0.03 -0.03,0.07 -0.03,0.11l0 0.38c0,0.08 0.04,0.16 0.1,0.2 0.01,0.01 0.02,0.02 0.04,0.02 0.02,0.01 0.07,0.03 0.1,0.03l1.37 0c0.06,0 0.12,-0.03 0.17,-0.08 0.02,-0.02 0.04,-0.05 0.05,-0.07 0.01,-0.03 0.02,-0.06 0.02,-0.1l0 -0.38c0,-0.04 -0.01,-0.08 -0.03,-0.11 -0.03,-0.06 -0.08,-0.1 -0.13,-0.13 -0.05,-0.02 -0.08,-0.02 -0.13,-0.02l0 -0.62c0,-0.03 -0,-0.06 -0.02,-0.08 -0.01,-0.02 -0.01,-0.02 -0.03,-0.03 -0,-0 -0.01,-0 -0.01,-0.01 -0.03,-0.02 -0.05,-0.02 -0.08,-0.02l-0.97 0c-0.05,0 -0.07,0.01 -0.1,0.03 -0.02,0.02 -0.04,0.05 -0.04,0.08z"></path>
                        <path d="M1.15 0.91c0,0.02 0.02,0.04 0.04,0.04l0.85 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.04 -0.04,-0.04l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path>
                        <path d="M1.15 1.09c0,0.02 0.02,0.04 0.04,0.04l0.86 0c0.02,0 0.04,-0.02 0.04,-0.05 -0,-0.02 -0.02,-0.04 -0.05,-0.04l-0.84 0c-0.03,0 -0.05,0.02 -0.05,0.04z"></path>
                        <path d="M1.15 1.27c0,0.02 0.02,0.04 0.04,0.04l0.84 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.05 -0.04,-0.05l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path>
                        <path d="M1.62 0c0.45,0 0.85,0.18 1.14,0.47 0.29,0.29 0.47,0.7 0.47,1.14 0,0.45 -0.18,0.85 -0.47,1.14 -0.29,0.29 -0.7,0.47 -1.14,0.47 -0.45,0 -0.85,-0.18 -1.14,-0.47 -0.29,-0.29 -0.47,-0.7 -0.47,-1.14 0,-0.45 0.18,-0.85 0.47,-1.14 0.29,-0.29 0.7,-0.47 1.14,-0.47zm1.09 0.52c-0.28,-0.28 -0.66,-0.45 -1.09,-0.45 -0.43,0 -0.81,0.17 -1.09,0.45 -0.28,0.28 -0.45,0.66 -0.45,1.09 0,0.43 0.17,0.81 0.45,1.09 0.28,0.28 0.66,0.45 1.09,0.45 0.43,0 0.81,-0.17 1.09,-0.45 0.28,-0.28 0.45,-0.66 0.45,-1.09 0,-0.43 -0.17,-0.81 -0.45,-1.09z"></path>
                    </g>
                </g>
              </svg>
                    <p>+998 98 999 99 99</p>
                </div>
                <div class="icon-text">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.966mm" height="1.9662mm"
                         version="1.1"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 5.12 5.12">
                <g>
                    <metadata></metadata>
                    <path d="M2.94 2.5l-0 -0 0.75 -0.65 0 1.4 -0.74 -0.74zm-0.64 0.11l0.01 -0.01 0.2 0.18 0 0 0.01 0 0.01 0 0.01 0 0.01 0 0 0 0.02 0 0.01 -0 0 -0 0.01 -0 0 -0 0.01 -0 0.01 -0 0 -0 0.2 -0.18 0.01 0.01 0.74 0.74 -2.02 0 0.74 -0.74zm0.26 -0l-0.98 -0.85 1.95 0 -0.98 0.85zm-1.12 -0.77l0.75 0.65 -0 0 -0.74 0.74 0 -1.4zm2.4 -0.41l-2.56 0c-0.09,0 -0.16,0.07 -0.16,0.16l0 1.92c0,0.09 0.07,0.16 0.16,0.16l2.56 0c0.09,0 0.16,-0.07 0.16,-0.16l0 -1.92c0,-0.09 -0.07,-0.16 -0.16,-0.16zm0.42 2.82c-0.45,0.45 -1.06,0.7 -1.7,0.7 -0.64,0 -1.24,-0.25 -1.7,-0.7 -0.45,-0.45 -0.7,-1.06 -0.7,-1.7 0,-0.64 0.25,-1.24 0.7,-1.7 0.45,-0.45 1.06,-0.7 1.7,-0.7 0.64,0 1.24,0.25 1.7,0.7 0.45,0.45 0.7,1.06 0.7,1.7 0,0.64 -0.25,1.24 -0.7,1.7zm-1.7 -4.26c-1.42,0 -2.56,1.15 -2.56,2.56 0,1.41 1.15,2.56 2.56,2.56 1.41,0 2.56,-1.15 2.56,-2.56 0,-1.41 -1.15,-2.56 -2.56,-2.56z"></path>
                </g>
              </svg>
                    <p>asd@mail.ru></p>
                </div>
            </div>
            <div class="box">
                <div class="title">ТАШКЕНТ</div>
                <div class="icon-text">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.944mm" height="1.9439mm"
                         version="1.1"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 3.23 3.23">
                <g>
                    <metadata></metadata>
                    <g>
                        <path d="M1.34 1.86c0,0.05 0.01,0.09 0.01,0.13 -0,0.05 -0.02,0.04 -0.07,0.06 -0.03,0.01 -0.06,0.02 -0.1,0.03 -0.01,0 -0.02,0 -0.02,0.01 -0.01,0 -0.02,0 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.07,0 -0,-0 -0,-0.01 -0.01,-0.01 -0.02,-0.02 -0.04,-0.05 -0.05,-0.08 -0.01,-0.03 -0,-0.06 0,-0.09 0.01,-0.02 0.01,-0.03 0.02,-0.05 0,-0.01 0.01,-0.02 0.01,-0.02 0.01,-0.02 0.01,-0.03 0.03,-0.04l0.02 -0.02c0,-0 0.01,-0 0.01,-0.01 0.01,-0.01 0.02,-0.02 0.04,-0.03 0.04,-0.02 0.14,-0.07 0.18,-0.08 0.19,-0.06 0.4,-0.04 0.6,0.01 0.02,0 0.03,0.01 0.05,0.01 0.05,0.02 0.08,0.03 0.13,0.06 0.03,0.02 0.05,0.03 0.06,0.06 0.02,0.02 0.04,0.05 0.04,0.08 0.02,0.05 0.03,0.1 0.01,0.15 -0,0.01 -0.01,0.01 -0.01,0.02 -0.01,0.02 -0.03,0.03 -0.04,0.04 -0,0 -0,0 -0.01,0.01 -0.04,0.03 -0.04,0.01 -0.1,-0.02 -0.01,-0 -0.02,-0.01 -0.04,-0.02l-0.04 -0.02c-0.03,-0.01 -0.09,-0.04 -0.1,-0.06 -0.01,-0.03 -0.01,-0.06 -0.01,-0.09 0,-0.06 -0,-0.06 -0.07,-0.08 -0.11,-0.03 -0.23,-0.04 -0.35,-0.01 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.02,0 -0.04,0.01 -0.04,0.04zm-0.27 -1.07c0,-0.02 0.02,-0.03 0.03,-0.03l1.02 0c0.02,0 0.03,0.02 0.03,0.03l0 0.64 -1.08 0 0 -0.64zm-0.09 -0.01l0 0.65c-0.07,0 -0.12,0 -0.18,0.04 -0.01,0.01 -0.02,0.02 -0.04,0.03 -0.02,0.02 -0.04,0.04 -0.05,0.08 -0.01,0.03 -0.03,0.07 -0.03,0.11l0 0.38c0,0.08 0.04,0.16 0.1,0.2 0.01,0.01 0.02,0.02 0.04,0.02 0.02,0.01 0.07,0.03 0.1,0.03l1.37 0c0.06,0 0.12,-0.03 0.17,-0.08 0.02,-0.02 0.04,-0.05 0.05,-0.07 0.01,-0.03 0.02,-0.06 0.02,-0.1l0 -0.38c0,-0.04 -0.01,-0.08 -0.03,-0.11 -0.03,-0.06 -0.08,-0.1 -0.13,-0.13 -0.05,-0.02 -0.08,-0.02 -0.13,-0.02l0 -0.62c0,-0.03 -0,-0.06 -0.02,-0.08 -0.01,-0.02 -0.01,-0.02 -0.03,-0.03 -0,-0 -0.01,-0 -0.01,-0.01 -0.03,-0.02 -0.05,-0.02 -0.08,-0.02l-0.97 0c-0.05,0 -0.07,0.01 -0.1,0.03 -0.02,0.02 -0.04,0.05 -0.04,0.08z"></path>
                        <path d="M1.15 0.91c0,0.02 0.02,0.04 0.04,0.04l0.85 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.04 -0.04,-0.04l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path>
                        <path d="M1.15 1.09c0,0.02 0.02,0.04 0.04,0.04l0.86 0c0.02,0 0.04,-0.02 0.04,-0.05 -0,-0.02 -0.02,-0.04 -0.05,-0.04l-0.84 0c-0.03,0 -0.05,0.02 -0.05,0.04z"></path>
                        <path d="M1.15 1.27c0,0.02 0.02,0.04 0.04,0.04l0.84 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.05 -0.04,-0.05l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path>
                        <path d="M1.62 0c0.45,0 0.85,0.18 1.14,0.47 0.29,0.29 0.47,0.7 0.47,1.14 0,0.45 -0.18,0.85 -0.47,1.14 -0.29,0.29 -0.7,0.47 -1.14,0.47 -0.45,0 -0.85,-0.18 -1.14,-0.47 -0.29,-0.29 -0.47,-0.7 -0.47,-1.14 0,-0.45 0.18,-0.85 0.47,-1.14 0.29,-0.29 0.7,-0.47 1.14,-0.47zm1.09 0.52c-0.28,-0.28 -0.66,-0.45 -1.09,-0.45 -0.43,0 -0.81,0.17 -1.09,0.45 -0.28,0.28 -0.45,0.66 -0.45,1.09 0,0.43 0.17,0.81 0.45,1.09 0.28,0.28 0.66,0.45 1.09,0.45 0.43,0 0.81,-0.17 1.09,-0.45 0.28,-0.28 0.45,-0.66 0.45,-1.09 0,-0.43 -0.17,-0.81 -0.45,-1.09z"></path>
                    </g>
                </g>
              </svg>
                    <a onclick="mapPanTo(41.305927,69.278291); return false;" class="address">faks
                    </a>
                </div>
                <div class="icon-text">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.966mm" height="1.9662mm"
                         version="1.1"
                         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 5.12 5.12">
                <g>
                    <metadata></metadata>
                    <path d="M2.94 2.5l-0 -0 0.75 -0.65 0 1.4 -0.74 -0.74zm-0.64 0.11l0.01 -0.01 0.2 0.18 0 0 0.01 0 0.01 0 0.01 0 0.01 0 0 0 0.02 0 0.01 -0 0 -0 0.01 -0 0 -0 0.01 -0 0.01 -0 0 -0 0.2 -0.18 0.01 0.01 0.74 0.74 -2.02 0 0.74 -0.74zm0.26 -0l-0.98 -0.85 1.95 0 -0.98 0.85zm-1.12 -0.77l0.75 0.65 -0 0 -0.74 0.74 0 -1.4zm2.4 -0.41l-2.56 0c-0.09,0 -0.16,0.07 -0.16,0.16l0 1.92c0,0.09 0.07,0.16 0.16,0.16l2.56 0c0.09,0 0.16,-0.07 0.16,-0.16l0 -1.92c0,-0.09 -0.07,-0.16 -0.16,-0.16zm0.42 2.82c-0.45,0.45 -1.06,0.7 -1.7,0.7 -0.64,0 -1.24,-0.25 -1.7,-0.7 -0.45,-0.45 -0.7,-1.06 -0.7,-1.7 0,-0.64 0.25,-1.24 0.7,-1.7 0.45,-0.45 1.06,-0.7 1.7,-0.7 0.64,0 1.24,0.25 1.7,0.7 0.45,0.45 0.7,1.06 0.7,1.7 0,0.64 -0.25,1.24 -0.7,1.7zm-1.7 -4.26c-1.42,0 -2.56,1.15 -2.56,2.56 0,1.41 1.15,2.56 2.56,2.56 1.41,0 2.56,-1.15 2.56,-2.56 0,-1.41 -1.15,-2.56 -2.56,-2.56z"></path>
                </g>
              </svg>
                    <p><?= LangHelper::t("Email", "Email", "Email"); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="flex_row_beet_cen medium_container">
        <div class="copyright">
            <a href="https://goldenminds.uz" target="_blank"><span>Разработка сайта</span><img
                        src="/img/logo-golden-minds.png" alt=""></a>
            <div>Copyright @ Все права защищены</div>
        </div>
        <div class="external_links">
            <a href="https://www.gov.uz" target='_blank'
               class="preload"><?= LangHelper::t("ПОРТАЛ", "ПОРТАЛ", "ПОРТАЛ"); ?> </a>
            <a href="https://pm.gov.uz" target='_blank'
               class="preload"><?= LangHelper::t("ВИРТУАЛЬНАЯ", "ВИРТУАЛЬНАЯ", "ВИРТУАЛЬНАЯ"); ?></a>
        </div>
        <div class="uzb flex_row">
            <a href="/symbols?v=2" class="preload"><span class="icon"><img src="/img/gerb.png"
                                                                           alt=""></span><span><?= LangHelper::t("Герб", "Герб", "Герб"); ?></span></a>
            <a href="/symbols?v=2" class="preload"><span class="icon"><img src="/img/flag.png"
                                                                           alt=""></span><span><?= LangHelper::t("Bayroq", "Bayroq", "Bayroq"); ?></span></a>
            <a href="/symbols?v=2" class="preload"><span class="icon"><img src="/img/gimn.png"
                                                                           alt=""></span><span><?= LangHelper::t("Madhiya", "Madhiya", "Madhiya"); ?></span></a>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
