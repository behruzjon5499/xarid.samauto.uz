<?php

use common\helpers\LangHelper;
use common\models\Auctions;
use common\helpers\LanguageHelper;

/* @var $auction Auctions
 * @var $auctions Auctions
 */

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
$conditions = 'conditions_'.$lang;
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

?>


<div class="sp-wrapper">
    <div class="container container-mini" >
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div style="text-align: center;">
                    <b style="color: red; font-size: 18px;">Хурматли харидорлар! Хар бир ютилган лот ўз нархида сотилишини эълон киламиз. <br>Онлайн савдода катнашинг ва ғолиб бўлинг!<br> !!! Онлайн савдога катнашиб лекин нарх таклиф килмаган тадбиркорлар билан шартнома тузилмайди !!!</b>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="order-card">
                    <header>
                        <h1><?=$auction->$title?></h1>
                        <p><?=$auction->$description?></p>
                    </header>
                    <div class="item">
                        <section class="title">
                            ● I. Предмет конкурса:
                        </section>
                        <p class="ml-3 mb-2"><b>● Местонахождение:</b> <?=$auction->address?></p>
                        <p class="ml-3 mb-2"><b>● Обьем:</b> <?=$auction->obyom?> тн</p>
                        <p class="ml-3 mb-2"><b>● Дата начала:</b><?= Yii::$app->formatter->asDate($auction->start_date, 'yyyy-MM-dd'); ?></p>
                        <p class="ml-3 mb-2"><b>● Дата окончания:</b> <?= Yii::$app->formatter->asDate($auction->end_date, 'yyyy-MM-dd'); ?> </p>
                    </div>
                    <div class="item mt-5">
                        <section class="title">
                            ● I. Стартовая цена:
                        </section>
                        <p class="ml-3 mb-2"><b>●  Стартовая цена:</b> <?=$auction->start_price?></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="lot-number">
                    <header>ЛОТ №: <?=$auction->id?></header>
                    <div class="body">
                        <div class="item">
                            <ul class="timer">
                                <li><span id="days"></span>ДНЕЙ</li>
                                <li><span id="hours"></span>ЧАСЫ</li>
                                <li><span id="minutes"></span>МИНУТЫ</li>
                                <li><span id="seconds"></span>СЕКУНДЫ</li>
                            </ul>
                        </div>
                        <p>Текущая цена:</p>
                        <h1><?=$auction->start_price?> СУМ</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="order-card">
                    <header>
                        <div class="item">
                            <a href="<?= yii\helpers\Url::to(['user-auctions/create','id'=>$auction->id
                            ]) ?>" style="margin: 0" class="download"><i class="fa fa-flag mx-1"></i>Предложить</a>
                        </div>
                        <h1>Как стать участником?</h1>

                    </header>
                    <div class="item">
                        <section class="title">
                            ● I.  РЕКВИЗИТЫ ПЛАТЕЖА:
                        </section>
                        <p><b>Реквизитлар: </b> <?=$auction->company->$title?></p>
                        <p><b>ИНН</b> <?=$auction->inn?></p>
                        <p><b><?=$auction->bank?></b></p>
                        <p><b>МФО:</b><?=$auction->mfo?></p>
                        <p><b>Хисоб ракам:</b> <?=$auction->account_number?></p>
                    </div>
                    <div class="item mt-5">
                        <section class="title">
                            ● I. СУММА ДЛЯ ОПЛАТЫ:
                        </section>
                        <p class="ml-3 mb-2"><b>● Сумма (30%):</b> <?=$auction->start_price * 0.3?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="order-card">
                    <header>
                        <h1>Участники</h1>
                    </header>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="partical-item">
                                <h1>0</h1>
                                <p>Список участников</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="partical-item">
                                <h1>0</h1>
                                <p>Количество ставок</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="partical-item">
                                <h1>не подано</h1>
                                <p>Последняя ставка</p>
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
                                <h1><?=$auction->company->$title?></h1>
                                <div class="status">
                                    <span>2381-Все конкурсы</span>
                                    <span>3415-Все онлайн продажи</span>
                                </div>
                                <div class="item">
                                    <h2>Адрес:</h2>
                                    <p><?=$auction->address?></p>
                                </div>
                                <div class="item">
                                    <h2>Телефон доверия</h2>
                                    <p><?=$auction->phone?></p>
                                </div>
                                <div class="item">
                                    <h2>Эл.почта</h2>
                                    <p><?=$auction->email?></p>
                                </div>
                            </div>
                        </div>
                        <div class="order-footer w-100">
                            <hr>
                            <div class="d-flex w-100">
                                <a href="#" target="_blank" class="donwload btn_1 mt-1" style="margin-left: auto">Подробнее</a>
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

    let countDown = new Date('<?= date('F d, Y', $auction->end_date) ?>').getTime(),
        x = setInterval(function() {

            let now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            //if (distance < 0) {
            //  clearInterval(x);
            //  'IT'S MY BIRTHDAY!;
            //}

        }, second)
</script>


<!---->
<!--<div class="main-footer">-->
<!--    <div class="medium_container">-->
<!--        <div class="contactPage">-->
<!--            <ul>-->
<!--                <li class="ul_title"><a href="index.html">Главная</a></li>-->
<!--                <li><a href="#company.html">Компании</a></li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li class="ul_title"><a href="faq.html">FAQ</a></li>-->
<!--                <li><a href="instructions.html">ДОКУМЕНТАЦИЯ</a></li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li class="ul_title"><a>Cоц. сети</a></li>-->
<!--                <div class="social-footer">-->
<!--                    <a href="#" target="_blank">-->
<!--                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"-->
<!--                             viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve">-->
<!--                                            <g>-->
<!--                                                <path d="M5.299,144.645l69.126,25.8l26.756,86.047c1.712,5.511,8.451,7.548,12.924,3.891l38.532-31.412-->
<!--                                                    c4.039-3.291,9.792-3.455,14.013-0.391l69.498,50.457c4.785,3.478,11.564,0.856,12.764-4.926L299.823,29.22-->
<!--                                                    c1.31-6.316-4.896-11.585-10.91-9.259L5.218,129.402C-1.783,132.102-1.722,142.014,5.299,144.645z M96.869,156.711l135.098-83.207-->
<!--                                                    c2.428-1.491,4.926,1.792,2.841,3.726L123.313,180.87c-3.919,3.648-6.447,8.53-7.163,13.829l-3.798,28.146-->
<!--                                                    c-0.503,3.758-5.782,4.131-6.819,0.494l-14.607-51.325C89.253,166.16,91.691,159.907,96.869,156.711z"/>-->
<!--                                            </g>-->
<!--                                        </svg>-->
<!--                    </a>-->
<!--                    <a href="#" target="_blank">-->
<!--                        <svg viewBox="-21 -21 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="m0 132.976562v374.046876c0 73.441406 59.535156 132.976562 132.976562 132.976562h374.046876c73.441406 0 132.976562-59.535156 132.976562-132.976562v-374.046876c0-73.441406-59.535156-132.976562-132.976562-132.976562h-374.046876c-73.441406 0-132.976562 59.535156-132.976562 132.976562zm387.792969 368.359376c-157.855469 54.464843-303.59375-91.273438-249.128907-249.128907 18.351563-53.203125 60.335938-95.191406 113.539063-113.542969 157.859375-54.464843 303.597656 91.273438 249.132813 249.132813-18.351563 53.203125-60.335938 95.1875-113.542969 113.539063zm154.28125-374.859376c-2.511719 13.152344-13.394531 20.804688-24.652344 20.804688-6.851563 0-13.835937-2.828125-19.183594-8.964844-.472656-.542968-.914062-1.125-1.304687-1.730468-5.519532-8.4375-5.691406-18.460938-1-26.589844 3.320312-5.753906 8.679687-9.863282 15.097656-11.582032 6.410156-1.726562 13.113281-.839843 18.859375 2.484376 8.132813 4.6875 12.992187 13.457031 12.4375 23.511718-.039063.6875-.121094 1.386719-.253906 2.066406zm0 0" />-->
<!--                            <path d="m320 164.523438c-85.734375 0-155.476562 69.742187-155.476562 155.476562s69.742187 155.476562 155.476562 155.476562 155.476562-69.742187 155.476562-155.476562-69.742187-155.476562-155.476562-155.476562zm0 0" />-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                    <a href="#" target="_blank">-->
<!--                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"-->
<!--                             width="96.124px" height="96.123px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;"-->
<!--                             xml:space="preserve">-->
<!--                                            <g>-->
<!--                                                <path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803-->
<!--                                                    c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654-->
<!--                                                    c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246-->
<!--                                                    c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>-->
<!--                                            </g>-->
<!--                                        </svg>-->
<!--                    </a>-->
<!--                    <a href="#" target="_blank">-->
<!--                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"-->
<!--                             width="90px" height="90px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">-->
<!--                                            <g>-->
<!--                                                <path d="M70.939,65.832H66l0.023-2.869c0-1.275,1.047-2.318,2.326-2.318h0.315c1.282,0,2.332,1.043,2.332,2.318-->
<!--                                                    L70.939,65.832z M52.413,59.684c-1.253,0-2.278,0.842-2.278,1.873V75.51c0,1.029,1.025,1.869,2.278,1.869-->
<!--                                                    c1.258,0,2.284-0.84,2.284-1.869V61.557C54.697,60.525,53.671,59.684,52.413,59.684z M82.5,51.879v26.544-->
<!--                                                    C82.5,84.79,76.979,90,70.23,90H19.771C13.02,90,7.5,84.79,7.5,78.423V51.879c0-6.367,5.52-11.578,12.271-11.578H70.23-->
<!--                                                    C76.979,40.301,82.5,45.512,82.5,51.879z M23.137,81.305l-0.004-27.961l6.255,0.002v-4.143l-16.674-0.025v4.073l5.205,0.015v28.039-->
<!--                                                    H23.137z M41.887,57.509h-5.215v14.931c0,2.16,0.131,3.24-0.008,3.621c-0.424,1.158-2.33,2.388-3.073,0.125-->
<!--                                                    c-0.126-0.396-0.015-1.591-0.017-3.643l-0.021-15.034h-5.186l0.016,14.798c0.004,2.268-0.051,3.959,0.018,4.729-->
<!--                                                    c0.127,1.357,0.082,2.939,1.341,3.843c2.346,1.69,6.843-0.252,7.968-2.668l-0.01,3.083l4.188,0.005L41.887,57.509L41.887,57.509z-->
<!--                                                     M58.57,74.607L58.559,62.18c-0.004-4.736-3.547-7.572-8.356-3.74l0.021-9.239l-5.209,0.008l-0.025,31.89l4.284-0.062l0.39-1.986-->
<!--                                                    C55.137,84.072,58.578,80.631,58.57,74.607z M74.891,72.96l-3.91,0.021c-0.002,0.155-0.008,0.334-0.01,0.529v2.182-->
<!--                                                    c0,1.168-0.965,2.119-2.137,2.119h-0.766c-1.174,0-2.139-0.951-2.139-2.119V75.45v-2.4v-3.097h8.954v-3.37-->
<!--                                                    c0-2.463-0.063-4.925-0.267-6.333c-0.641-4.454-6.893-5.161-10.051-2.881c-0.991,0.712-1.748,1.665-2.188,2.945-->
<!--                                                    c-0.444,1.281-0.665,3.031-0.665,5.254v7.41C61.714,85.296,76.676,83.555,74.891,72.96z M54.833,32.732-->
<!--                                                    c0.269,0.654,0.687,1.184,1.254,1.584c0.56,0.394,1.276,0.592,2.134,0.592c0.752,0,1.418-0.203,1.998-0.622-->
<!--                                                    c0.578-0.417,1.065-1.04,1.463-1.871l-0.099,2.046h5.813V9.74H62.82v19.24c0,1.042-0.858,1.895-1.907,1.895-->
<!--                                                    c-1.043,0-1.904-0.853-1.904-1.895V9.74h-4.776v16.674c0,2.124,0.039,3.54,0.102,4.258C54.4,31.385,54.564,32.069,54.833,32.732z-->
<!--                                                     M37.217,18.77c0-2.373,0.198-4.226,0.591-5.562c0.396-1.331,1.107-2.401,2.137-3.208c1.027-0.811,2.342-1.217,3.941-1.217-->
<!--                                                    c1.345,0,2.497,0.264,3.459,0.781c0.967,0.52,1.713,1.195,2.23,2.028c0.527,0.836,0.885,1.695,1.076,2.574-->
<!--                                                    c0.195,0.891,0.291,2.235,0.291,4.048v6.252c0,2.293-0.092,3.98-0.271,5.051c-0.177,1.074-0.557,2.07-1.146,3.004-->
<!--                                                    c-0.58,0.924-1.329,1.615-2.237,2.056c-0.918,0.445-1.968,0.663-3.154,0.663c-1.325,0-2.441-0.183-3.361-0.565-->
<!--                                                    c-0.923-0.38-1.636-0.953-2.144-1.714c-0.513-0.762-0.874-1.69-1.092-2.772c-0.219-1.081-0.323-2.707-0.323-4.874L37.217,18.77-->
<!--                                                    L37.217,18.77z M41.77,28.59c0,1.4,1.042,2.543,2.311,2.543c1.27,0,2.308-1.143,2.308-2.543V15.43c0-1.398-1.038-2.541-2.308-2.541-->
<!--                                                    c-1.269,0-2.311,1.143-2.311,2.541V28.59z M25.682,35.235h5.484l0.006-18.96l6.48-16.242h-5.998l-3.445,12.064L24.715,0h-5.936-->
<!--                                                    l6.894,16.284L25.682,35.235z"/>-->
<!--                                            </g>-->
<!--                                        </svg>-->
<!--                    </a>-->
<!--                    <a href="https://rss.app/feeds/6QFlHbZupDoXiNCJ.xml">-->
<!--                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"-->
<!--                             viewBox="0 0 485 485" style="enable-background:new 0 0 485 485;" xml:space="preserve">-->
<!--                                <g>-->
<!--                                    <path d="M339.708,400H400c-0.035-86.835-35.341-165.515-92.369-222.578C250.567,120.359,171.953,85.035,85.136,85v60.121-->
<!--                                        C225.512,145.226,339.603,259.505,339.708,400z"/>-->
<!--                                    <path d="M232.451,399.899c0.017,0,0.017,0.101,0.017,0.101h60.397c-0.052-57.304-23.345-109.187-60.996-146.869-->
<!--                                        c-37.664-37.686-89.534-60.979-146.833-61.014v60.139c39.27,0.035,76.409,15.452,104.195,43.291-->
<!--                                        C217.02,323.302,232.385,360.489,232.451,399.899z"/>-->
<!--                                    <path d="M126.821,399.606c11.567,0,21.958-4.629,29.614-12.219c7.586-7.604,12.237-17.925,12.272-29.426-->
<!--                                        c-0.035-11.502-4.686-21.844-12.307-29.466c-7.621-7.586-18.012-12.254-29.579-12.254c-11.555,0-21.928,4.668-29.549,12.237-->
<!--                                        C89.681,336.086,85,346.459,85,357.961c0,11.502,4.681,21.84,12.272,29.426C104.876,394.96,115.266,399.606,126.821,399.606z"/>-->
<!--                                    <path d="M0,0v485h485V0H0z M455,455H30V30h425V455z"/>-->
<!--                                </g>-->
<!--                            </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </ul>-->
<!--            <div class="box">-->
<!--                <div class="title">--><?//=LangHelper::t("САМАРКАНД", "SAMARQAND", "SAMARKAND"); ?><!--</div>-->
<!--                <a onclick="mapPanTo(39.648095,66.910189); return false;" class="address">--><?//=$page['sam_address_'.$lang]?><!--</a>-->
<!--                <div class="icon-text">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.944mm" height="1.9439mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 3.23 3.23" xmlns:xlink="http://www.w3.org/1999/xlink"><g><metadata></metadata><g><path d="M1.34 1.86c0,0.05 0.01,0.09 0.01,0.13 -0,0.05 -0.02,0.04 -0.07,0.06 -0.03,0.01 -0.06,0.02 -0.1,0.03 -0.01,0 -0.02,0 -0.02,0.01 -0.01,0 -0.02,0 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.07,0 -0,-0 -0,-0.01 -0.01,-0.01 -0.02,-0.02 -0.04,-0.05 -0.05,-0.08 -0.01,-0.03 -0,-0.06 0,-0.09 0.01,-0.02 0.01,-0.03 0.02,-0.05 0,-0.01 0.01,-0.02 0.01,-0.02 0.01,-0.02 0.01,-0.03 0.03,-0.04l0.02 -0.02c0,-0 0.01,-0 0.01,-0.01 0.01,-0.01 0.02,-0.02 0.04,-0.03 0.04,-0.02 0.14,-0.07 0.18,-0.08 0.19,-0.06 0.4,-0.04 0.6,0.01 0.02,0 0.03,0.01 0.05,0.01 0.05,0.02 0.08,0.03 0.13,0.06 0.03,0.02 0.05,0.03 0.06,0.06 0.02,0.02 0.04,0.05 0.04,0.08 0.02,0.05 0.03,0.1 0.01,0.15 -0,0.01 -0.01,0.01 -0.01,0.02 -0.01,0.02 -0.03,0.03 -0.04,0.04 -0,0 -0,0 -0.01,0.01 -0.04,0.03 -0.04,0.01 -0.1,-0.02 -0.01,-0 -0.02,-0.01 -0.04,-0.02l-0.04 -0.02c-0.03,-0.01 -0.09,-0.04 -0.1,-0.06 -0.01,-0.03 -0.01,-0.06 -0.01,-0.09 0,-0.06 -0,-0.06 -0.07,-0.08 -0.11,-0.03 -0.23,-0.04 -0.35,-0.01 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.02,0 -0.04,0.01 -0.04,0.04zm-0.27 -1.07c0,-0.02 0.02,-0.03 0.03,-0.03l1.02 0c0.02,0 0.03,0.02 0.03,0.03l0 0.64 -1.08 0 0 -0.64zm-0.09 -0.01l0 0.65c-0.07,0 -0.12,0 -0.18,0.04 -0.01,0.01 -0.02,0.02 -0.04,0.03 -0.02,0.02 -0.04,0.04 -0.05,0.08 -0.01,0.03 -0.03,0.07 -0.03,0.11l0 0.38c0,0.08 0.04,0.16 0.1,0.2 0.01,0.01 0.02,0.02 0.04,0.02 0.02,0.01 0.07,0.03 0.1,0.03l1.37 0c0.06,0 0.12,-0.03 0.17,-0.08 0.02,-0.02 0.04,-0.05 0.05,-0.07 0.01,-0.03 0.02,-0.06 0.02,-0.1l0 -0.38c0,-0.04 -0.01,-0.08 -0.03,-0.11 -0.03,-0.06 -0.08,-0.1 -0.13,-0.13 -0.05,-0.02 -0.08,-0.02 -0.13,-0.02l0 -0.62c0,-0.03 -0,-0.06 -0.02,-0.08 -0.01,-0.02 -0.01,-0.02 -0.03,-0.03 -0,-0 -0.01,-0 -0.01,-0.01 -0.03,-0.02 -0.05,-0.02 -0.08,-0.02l-0.97 0c-0.05,0 -0.07,0.01 -0.1,0.03 -0.02,0.02 -0.04,0.05 -0.04,0.08z"></path><path d="M1.15 0.91c0,0.02 0.02,0.04 0.04,0.04l0.85 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.04 -0.04,-0.04l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path><path d="M1.15 1.09c0,0.02 0.02,0.04 0.04,0.04l0.86 0c0.02,0 0.04,-0.02 0.04,-0.05 -0,-0.02 -0.02,-0.04 -0.05,-0.04l-0.84 0c-0.03,0 -0.05,0.02 -0.05,0.04z"></path><path d="M1.15 1.27c0,0.02 0.02,0.04 0.04,0.04l0.84 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.05 -0.04,-0.05l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path><path d="M1.62 0c0.45,0 0.85,0.18 1.14,0.47 0.29,0.29 0.47,0.7 0.47,1.14 0,0.45 -0.18,0.85 -0.47,1.14 -0.29,0.29 -0.7,0.47 -1.14,0.47 -0.45,0 -0.85,-0.18 -1.14,-0.47 -0.29,-0.29 -0.47,-0.7 -0.47,-1.14 0,-0.45 0.18,-0.85 0.47,-1.14 0.29,-0.29 0.7,-0.47 1.14,-0.47zm1.09 0.52c-0.28,-0.28 -0.66,-0.45 -1.09,-0.45 -0.43,0 -0.81,0.17 -1.09,0.45 -0.28,0.28 -0.45,0.66 -0.45,1.09 0,0.43 0.17,0.81 0.45,1.09 0.28,0.28 0.66,0.45 1.09,0.45 0.43,0 0.81,-0.17 1.09,-0.45 0.28,-0.28 0.45,-0.66 0.45,-1.09 0,-0.43 -0.17,-0.81 -0.45,-1.09z"></path></g></g></svg>-->
<!--                    <p>+998 98 999 99 99</p>-->
<!--                </div>-->
<!--                <div class="icon-text">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.966mm" height="1.9662mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 5.12 5.12" xmlns:xlink="http://www.w3.org/1999/xlink"><g><metadata></metadata><path d="M2.94 2.5l-0 -0 0.75 -0.65 0 1.4 -0.74 -0.74zm-0.64 0.11l0.01 -0.01 0.2 0.18 0 0 0.01 0 0.01 0 0.01 0 0.01 0 0 0 0.02 0 0.01 -0 0 -0 0.01 -0 0 -0 0.01 -0 0.01 -0 0 -0 0.2 -0.18 0.01 0.01 0.74 0.74 -2.02 0 0.74 -0.74zm0.26 -0l-0.98 -0.85 1.95 0 -0.98 0.85zm-1.12 -0.77l0.75 0.65 -0 0 -0.74 0.74 0 -1.4zm2.4 -0.41l-2.56 0c-0.09,0 -0.16,0.07 -0.16,0.16l0 1.92c0,0.09 0.07,0.16 0.16,0.16l2.56 0c0.09,0 0.16,-0.07 0.16,-0.16l0 -1.92c0,-0.09 -0.07,-0.16 -0.16,-0.16zm0.42 2.82c-0.45,0.45 -1.06,0.7 -1.7,0.7 -0.64,0 -1.24,-0.25 -1.7,-0.7 -0.45,-0.45 -0.7,-1.06 -0.7,-1.7 0,-0.64 0.25,-1.24 0.7,-1.7 0.45,-0.45 1.06,-0.7 1.7,-0.7 0.64,0 1.24,0.25 1.7,0.7 0.45,0.45 0.7,1.06 0.7,1.7 0,0.64 -0.25,1.24 -0.7,1.7zm-1.7 -4.26c-1.42,0 -2.56,1.15 -2.56,2.56 0,1.41 1.15,2.56 2.56,2.56 1.41,0 2.56,-1.15 2.56,-2.56 0,-1.41 -1.15,-2.56 -2.56,-2.56z"></path></g></svg>-->
<!--                    <p>asd@mail.ru></p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="box">-->
<!--                <div class="title">ТАШКЕНТ</div>-->
<!--                <div class="icon-text">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.944mm" height="1.9439mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 3.23 3.23" xmlns:xlink="http://www.w3.org/1999/xlink"><g><metadata></metadata><g><path d="M1.34 1.86c0,0.05 0.01,0.09 0.01,0.13 -0,0.05 -0.02,0.04 -0.07,0.06 -0.03,0.01 -0.06,0.02 -0.1,0.03 -0.01,0 -0.02,0 -0.02,0.01 -0.01,0 -0.02,0 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.07,0 -0,-0 -0,-0.01 -0.01,-0.01 -0.02,-0.02 -0.04,-0.05 -0.05,-0.08 -0.01,-0.03 -0,-0.06 0,-0.09 0.01,-0.02 0.01,-0.03 0.02,-0.05 0,-0.01 0.01,-0.02 0.01,-0.02 0.01,-0.02 0.01,-0.03 0.03,-0.04l0.02 -0.02c0,-0 0.01,-0 0.01,-0.01 0.01,-0.01 0.02,-0.02 0.04,-0.03 0.04,-0.02 0.14,-0.07 0.18,-0.08 0.19,-0.06 0.4,-0.04 0.6,0.01 0.02,0 0.03,0.01 0.05,0.01 0.05,0.02 0.08,0.03 0.13,0.06 0.03,0.02 0.05,0.03 0.06,0.06 0.02,0.02 0.04,0.05 0.04,0.08 0.02,0.05 0.03,0.1 0.01,0.15 -0,0.01 -0.01,0.01 -0.01,0.02 -0.01,0.02 -0.03,0.03 -0.04,0.04 -0,0 -0,0 -0.01,0.01 -0.04,0.03 -0.04,0.01 -0.1,-0.02 -0.01,-0 -0.02,-0.01 -0.04,-0.02l-0.04 -0.02c-0.03,-0.01 -0.09,-0.04 -0.1,-0.06 -0.01,-0.03 -0.01,-0.06 -0.01,-0.09 0,-0.06 -0,-0.06 -0.07,-0.08 -0.11,-0.03 -0.23,-0.04 -0.35,-0.01 -0.02,0.01 -0.04,0.01 -0.06,0.02 -0.02,0 -0.04,0.01 -0.04,0.04zm-0.27 -1.07c0,-0.02 0.02,-0.03 0.03,-0.03l1.02 0c0.02,0 0.03,0.02 0.03,0.03l0 0.64 -1.08 0 0 -0.64zm-0.09 -0.01l0 0.65c-0.07,0 -0.12,0 -0.18,0.04 -0.01,0.01 -0.02,0.02 -0.04,0.03 -0.02,0.02 -0.04,0.04 -0.05,0.08 -0.01,0.03 -0.03,0.07 -0.03,0.11l0 0.38c0,0.08 0.04,0.16 0.1,0.2 0.01,0.01 0.02,0.02 0.04,0.02 0.02,0.01 0.07,0.03 0.1,0.03l1.37 0c0.06,0 0.12,-0.03 0.17,-0.08 0.02,-0.02 0.04,-0.05 0.05,-0.07 0.01,-0.03 0.02,-0.06 0.02,-0.1l0 -0.38c0,-0.04 -0.01,-0.08 -0.03,-0.11 -0.03,-0.06 -0.08,-0.1 -0.13,-0.13 -0.05,-0.02 -0.08,-0.02 -0.13,-0.02l0 -0.62c0,-0.03 -0,-0.06 -0.02,-0.08 -0.01,-0.02 -0.01,-0.02 -0.03,-0.03 -0,-0 -0.01,-0 -0.01,-0.01 -0.03,-0.02 -0.05,-0.02 -0.08,-0.02l-0.97 0c-0.05,0 -0.07,0.01 -0.1,0.03 -0.02,0.02 -0.04,0.05 -0.04,0.08z"></path><path d="M1.15 0.91c0,0.02 0.02,0.04 0.04,0.04l0.85 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.04 -0.04,-0.04l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path><path d="M1.15 1.09c0,0.02 0.02,0.04 0.04,0.04l0.86 0c0.02,0 0.04,-0.02 0.04,-0.05 -0,-0.02 -0.02,-0.04 -0.05,-0.04l-0.84 0c-0.03,0 -0.05,0.02 -0.05,0.04z"></path><path d="M1.15 1.27c0,0.02 0.02,0.04 0.04,0.04l0.84 0c0.02,0 0.04,-0.02 0.04,-0.04 0,-0.02 -0.02,-0.05 -0.04,-0.05l-0.85 0c-0.02,0 -0.04,0.02 -0.04,0.04z"></path><path d="M1.62 0c0.45,0 0.85,0.18 1.14,0.47 0.29,0.29 0.47,0.7 0.47,1.14 0,0.45 -0.18,0.85 -0.47,1.14 -0.29,0.29 -0.7,0.47 -1.14,0.47 -0.45,0 -0.85,-0.18 -1.14,-0.47 -0.29,-0.29 -0.47,-0.7 -0.47,-1.14 0,-0.45 0.18,-0.85 0.47,-1.14 0.29,-0.29 0.7,-0.47 1.14,-0.47zm1.09 0.52c-0.28,-0.28 -0.66,-0.45 -1.09,-0.45 -0.43,0 -0.81,0.17 -1.09,0.45 -0.28,0.28 -0.45,0.66 -0.45,1.09 0,0.43 0.17,0.81 0.45,1.09 0.28,0.28 0.66,0.45 1.09,0.45 0.43,0 0.81,-0.17 1.09,-0.45 0.28,-0.28 0.45,-0.66 0.45,-1.09 0,-0.43 -0.17,-0.81 -0.45,-1.09z"></path></g></g></svg>-->
<!--                    <a onclick="mapPanTo(41.305927,69.278291); return false;" class="address">faks-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="icon-text">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.966mm" height="1.9662mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 5.12 5.12" xmlns:xlink="http://www.w3.org/1999/xlink"><g><metadata></metadata><path d="M2.94 2.5l-0 -0 0.75 -0.65 0 1.4 -0.74 -0.74zm-0.64 0.11l0.01 -0.01 0.2 0.18 0 0 0.01 0 0.01 0 0.01 0 0.01 0 0 0 0.02 0 0.01 -0 0 -0 0.01 -0 0 -0 0.01 -0 0.01 -0 0 -0 0.2 -0.18 0.01 0.01 0.74 0.74 -2.02 0 0.74 -0.74zm0.26 -0l-0.98 -0.85 1.95 0 -0.98 0.85zm-1.12 -0.77l0.75 0.65 -0 0 -0.74 0.74 0 -1.4zm2.4 -0.41l-2.56 0c-0.09,0 -0.16,0.07 -0.16,0.16l0 1.92c0,0.09 0.07,0.16 0.16,0.16l2.56 0c0.09,0 0.16,-0.07 0.16,-0.16l0 -1.92c0,-0.09 -0.07,-0.16 -0.16,-0.16zm0.42 2.82c-0.45,0.45 -1.06,0.7 -1.7,0.7 -0.64,0 -1.24,-0.25 -1.7,-0.7 -0.45,-0.45 -0.7,-1.06 -0.7,-1.7 0,-0.64 0.25,-1.24 0.7,-1.7 0.45,-0.45 1.06,-0.7 1.7,-0.7 0.64,0 1.24,0.25 1.7,0.7 0.45,0.45 0.7,1.06 0.7,1.7 0,0.64 -0.25,1.24 -0.7,1.7zm-1.7 -4.26c-1.42,0 -2.56,1.15 -2.56,2.56 0,1.41 1.15,2.56 2.56,2.56 1.41,0 2.56,-1.15 2.56,-2.56 0,-1.41 -1.15,-2.56 -2.56,-2.56z"></path></g></svg>-->
<!--                    <p>email</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="footer">-->
<!--    <div class="flex_row_beet_cen medium_container">-->
<!--        <div class="copyright">-->
<!--            <a href="https://goldenminds.uz" target="_blank"><span>Разработка сайта</span><img src="/images/logo-golden-minds.png" alt=""></a>-->
<!--            <div>Copyright @ Все права защищены</div>-->
<!--        </div>-->
<!--        <div class="external_links">-->
<!--            <a href="https://www.gov.uz" target='_blank' class="preload">ПОРТАЛ </a>-->
<!--            <a href="https://pm.gov.uz" target='_blank' class="preload">ВИРТУАЛЬНАЯ</a>-->
<!--        </div>-->
<!--        <div class="uzb flex_row">-->
<!--            <a href="/symbols?v=2" class="preload"><span class="icon"><img src="/img/gerb.png" alt=""></span><span>Герб</span></a>-->
<!--            <a href="/symbols?v=2" class="preload"><span class="icon"><img src="/img/flag.png" alt=""></span><span>Герб</span></a>-->
<!--            <a href="/symbols?v=2" class="preload"><span class="icon"><img src="/img/gimn.png" alt=""></span><span>Герб</span></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div class="modal fade profile-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Фойдаланувчининг маълумотларини ўзгартириш </h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form class="form-group">-->
<!--                    <input type="text" class="form-control" placeholder="Логин">-->
<!--                    <input type="email" class="form-control" placeholder="Email">-->
<!--                    <input type="text" class="form-control" placeholder="Телефон">-->
<!--                    <select class="form-control" id="exampleFormControlSelect1">-->
<!--                        <option>SamAuto</option>-->
<!--                        <option>2</option>-->
<!--                        <option>3</option>-->
<!--                        <option>4</option>-->
<!--                        <option>5</option>-->
<!--                    </select>-->
<!--                    <select class="form-control" id="exampleFormControlSelect1">-->
<!--                        <option>Худуни танланг</option>-->
<!--                        <option>Тошкент шахри</option>-->
<!--                    </select>-->
<!--                </form>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Бекор қилиш</button>-->
<!--                <button type="button" class="btn btn-primary">Сақлаш</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div class="modal fade profile-modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Паролни ўзгартириш </h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form class="form-group">-->
<!--                    <input type="password" class="form-control" placeholder="Ески паролни киритинг">-->
<!--                    <input type="password" class="form-control" placeholder="Янги паролни киритинг">-->
<!--                    <input type="password" class="form-control" placeholder="Янги паролни тасдиқланг">-->
<!--                </form>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Бекор қилиш</button>-->
<!--                <button type="button" class="btn btn-primary">Сақлаш</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->