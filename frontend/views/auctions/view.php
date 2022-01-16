<?php

use common\helpers\LangHelper;
use common\models\Auctions;
use common\models\UserAuctions;
use yii\helpers\VarDumper;
/* @var $auction Auctions
 * @var $auctions Auctions
 * @var $countss Auctions
 * @var $counts Auctions
 */

$time = new \DateTime('now');
$today = $time->format('d-m-Y H:i:s');
$t = strtotime($today);

$this->title = 'Xarid | Samauto.uz';

$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';
//
//\yii\helpers\VarDumper::dump($auction,12,true);
//die();

$title = 'title_' . $lang;
$address = 'address_' . $lang;
$price_auction = 'price_auction_' . $lang;
$predmet_auction = 'predmet_auction_' . $lang;
$contacts = 'contacts_' . $lang;
$payment_auction = 'payment_auction_' . $lang;
$date_auction = 'date_auction_' . $lang;
$contacts = 'date_' . $lang;
$predmet_auction = 'predmet_auction_' . $lang;
$payments = 'payments_' . $lang;
$subjects = 'subjects_' . $lang;
$conditions = 'conditions_' . $lang;
$description = 'description_' . $lang;
$answer = 'answer_' . $lang;
$signup = 'signup_' . $lang;
$support = 'support_' . $lang;
$podacha = 'podacha_' . $lang;
$text = 'text_' . $lang;
$name = 'name_' . $lang;
$descr = 'descr_' . $lang;
$link = 'link_' . $lang;
$material = 'material_' . $lang;

$_engine['size_obyom'][1] = LangHelper::t("штук", "штук", "штук");
$_engine['size_obyom'][2] = LangHelper::t("тонна", "тонна", "тонна");
$_engine['size_obyom'][3] = LangHelper::t("кг", "кг", "кг");
$_engine['size_obyom'][4] = LangHelper::t("кв.м", "кв.м", "кв.м");
?>

<div class="sp-wrapper">
    <div class="container container-mini">
        <div class="row">
            <div class="col-lg-12 mb-4">

                <?php
                if (Yii::$app->session->hasFlash('error')): ?>
                    <div class="alert alert-warning">
                        <?= Yii::$app->session->getFlash('error') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-8">
                <div class="order-card">
                    <header>
                        <h1><?= $auction->$title ?></h1>
                        <p><?= $auction->$description ?></p>
                    </header>
                    <div class="item">
                        <section class="title">
                            ● I.<?= LangHelper::t("Предмет конкурса", "Konkurs ma'lumotlari ", "Contest subject"); ?> :
                        </section>
                        <p class="ml-3 mb-2"><b>● <?= LangHelper::t("Местонахождение", "Manzil", "Location"); ?>
                                :</b> <?= $auction->address ?></p>
                        <p class="ml-3 mb-2"><b>● <?= LangHelper::t("Обьем", "Hajmi", "Volume"); ?>
                                :</b> <?= $auction->obyom ?> <?= @$_engine['size_obyom'][$auction->size_obyom] ?></p>
                        <p class="ml-3 mb-2"><b>●<?= LangHelper::t("Дата начала", "Boshlanish sanasi", "Start date"); ?>
                                :</b><?= Yii::$app->formatter->asDate($auction->start_date, 'yyyy-MM-dd'); ?></p>
                        <p class="ml-3 mb-2">
                            <b>● <?= LangHelper::t("Дата окончания", "Tugash muddati", "Expiration date"); ?>
                                :</b> <?= Yii::$app->formatter->asDate($auction->end_date, 'yyyy-MM-dd'); ?> </p>
                    </div>
                    <div class="item mt-5">
                        <section class="title">
                            ● I. <?= LangHelper::t("Стартовая цена:", "Boshlang'ich narx:", "Starting price:"); ?>
                        </section>
                        <p class="ml-3 mb-2">
                            <b>● <?= LangHelper::t("Стартовая цена:", "Boshlang'ich narx:", "Starting price:"); ?>
                                :</b> <?= $auction->start_price ?></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="lot-number">
                    <header><?= LangHelper::t("Лот №", " Lot № ", " Lot №"); ?>: <?= $auction->id ?></header>
                    <div class="body">
                        <div class="item">
                            <ul class="timer">
                                <?php if ($auction->end_date < $t){ ?>
                                    <h1><?= LangHelper::t("Продано", "Sotildi", "Saled"); ?></h1>
                                <?php } else { ?>
                                    <li><span id="days"></span><?= LangHelper::t("Дней", "Kun", "Days"); ?></li>
                                    <li><span id="hours"></span><?= LangHelper::t("Часы", "Soat", "Hours"); ?></li>
                                    <li><span id="minutes"></span><?= LangHelper::t("Минуты", "Daqiqa", "Minutes"); ?></li>
                                    <li><span id="seconds"></span><?= LangHelper::t("Секунды", "Soniya", "Seconds"); ?></li>
                                <?php } ?>

                            </ul>
                        </div>
                        <p><?= LangHelper::t("Текущая цена:", " Hozirgi narx :", " Current price:"); ?></p>
                        <?php if (!empty($prices)){ ?>
                        <h1><?php echo $prices->price ?>  <?= LangHelper::t("СУМ", "SO'M", "SUM"); ?></h1>
                        <?php } else { ?>
                            <h1><?php echo $auction->start_price ?>  <?= LangHelper::t("СУМ", "SO'M", "SUM"); ?></h1>
                        <?php } ?>
                        <?php if (!empty($auction->file)){ ?>
                        <div class="item" style="text-align: right; display: inline;">
                            <a href="/uploads/auctions/<?= $auction->file?>" style="margin: 0; font-size: 20px;" class="download"><i
                                        class="fa fa-flag mx-1"></i><?= LangHelper::t("Прикрепленный файл", "Biriktirilgan fayl", "Attached file"); ?>
                            </a>
                        </div>
                        <?php }  if(!empty($auction->photo)) { ?>
                        <div class="item" style="text-align: right; display: inline;">
                            <a href="/uploads/auctions/<?= $auction->photo?>" style="margin: 10px 0; font-size: 20px;" class="download"><i
                                        class="fa fa-flag mx-1"></i><?= LangHelper::t("Прикрепленный фото", "Biriktirilgan rasm", "Attached photo"); ?>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="order-card">
                    <header>
                        <?php if (!(Yii::$app->user->isGuest)): { ?>
                            <div class="item" style="text-align: center; margin: 10px 0;">
                                <a href="<?= yii\helpers\Url::to(['user-auctions/create', 'id' => $auction->id
                                ]) ?>" style="margin: 0" class="download"><i
                                            class="fa fa-flag mx-1"></i><?= LangHelper::t("Предложить", " Taklif berish ", "Offer"); ?>
                                </a>
                            </div>

                        <?php } endif; ?>
                        <?php if ((Yii::$app->user->isGuest)): { ?>
                        <h1><?= LangHelper::t("Как стать участником?", "Qanday qilib qatnashish mumkin?", "How to get involved?"); ?></h1>
                        <?php } endif; ?>
                    </header>


                </div>
            </div>
            <div class="col-lg-8">
                <div class="order-card">
                    <header>
                        <h1><?= LangHelper::t("Участники", "Ishtirokchilar", "Participants"); ?></h1>
                    </header>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="partical-item">
                                <h1><?php echo $countss ?></h1>
                                <p><?= LangHelper::t("Список участников", "Ishtirokchilar ro'yxati", "List of participants"); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="partical-item">
                                <h1><?php echo  $counts ?></h1>
                                <p><?= LangHelper::t("Количество ставок", "Stavkalar soni", "Number of bets"); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="partical-item">
                                <?php if (!empty($prices)){ ?>
                                    <h1><?php echo $prices->price ?> </h1>
                                <?php } else { ?>
                                  <h1><?= LangHelper::t("не подано", "qatnashilmadi", "not submitted"); ?></h1>
                               <?php } ?>
                                <p><?= LangHelper::t("Последняя ставка", "Oxirgi stavka", "Last bet"); ?></p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>

            <div class="col-lg-8">
                <div class="order-card">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="w-100" style="max-width: 200px" src="/img/xarid_logo.png">
                        </div>
                        <div class="col-md-9">
                            <div class="partical-info">
                                <h1><?= $auction->company->$title ?></h1>
                                <div class="status">
                                    <span>2381- <?= LangHelper::t("Все конкурсы", "Barcha tenderlar", "All contests"); ?></span>
                                    <span>3415-   <?= LangHelper::t("Все продажи", " Barcha savdolar", "All sales "); ?></span>
                                </div>
                                <div class="item">
                                    <h2><?= LangHelper::t("Адрес", "Manzil", "Address"); ?>:</h2>
                                    <p><?= $auction->address ?></p>
                                </div>
                                <div class="item">
                                    <h2><?= LangHelper::t("Телефон доверия", "Ishonch nomeri", "Телефон доверия"); ?></h2>
                                    <p><?= $auction->phone ?></p>
                                </div>
                                <div class="item">
                                    <h2><?= LangHelper::t("Эл.почта", "Elektron pochta", "Email"); ?></h2>
                                    <p><?= $auction->email ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="order-footer w-100">
                            <hr>
                            <div class="d-flex w-100">
                                <a href="#" target="_blank" class="donwload btn_1 mt-1"
                                   style="margin-left: auto"><?= LangHelper::t("Подробнее", "Подробнее", "Подробнее"); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // timer js
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date('<?= date('F d, Y H:i:s', $auction->end_date) ?>').getTime(),
        x = setInterval(function () {

            let now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

        }, second)
</script>
