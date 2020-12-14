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
    <div class="container" >
        <div class="print-header" style="position: relative;">
            <h3 style="margin-top: 10px; " class="job__title">
               <?=$auction->$title?>
            </h3>
            <img class="printer" style="position: absolute;right: 20px;" onclick="window.print()" src="/img/print.png">
            <div class="item-order-cog">
                <div class="item">
                    <a href="uploads/auctions/<?=$auction->file?>" download="" style="margin: 0" class="download" target="_blank">  <?= LangHelper::t("СКАЧАТЬ: Вложение", "СКАЧАТЬ: Вложение", "СКАЧАТЬ: Вложение"); ?></a>
                </div>
                <div class="item">
                    <a href="<?= yii\helpers\Url::to(['user-auctions/create' ,'id'=>$auction->id]) ?>" style="margin: 0" class="download"><i class="fa fa-flag mx-1"></i>  <?= LangHelper::t("Предложить", "Предложить", "Предложить"); ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="order-item-info" >
                    <div style="margin-top: 0px; min-height: 680px; margin-bottom: 10px;" class="tab-content">
                        <div class="tab-pane fade show product-tab active" id="product-details">
                            <div class="tab-content-wrapper">
                                <p style="font-weight: bold;">     <?= LanguageHelper::get($auction, 'description') ?></p>
                                <br>
                                <span style="font-weight: bold; margin-bottom: 0px; padding-bottom: 0px;">
                       I.   <?= LangHelper::t("Предмет конкурса", "Предмет конкурса", "Предмет конкурса"); ?>:
                       <p></p>
                       <p><strong>&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>I</strong><strong>.   <?= LangHelper::t("Тел. для контакта", "Тел. для контакта", "Тел. для контакта"); ?>:</strong> +99871 150-2200, 2, 4189#, E-mail:&nbsp;Ilhomjon.saidov@uzautomotors.com</p>
                       <div class="w-100 d-flex">
                         <table align="left" border="1" cellspacing="0">
                            <tbody>
                               <tr>
                                  <td>
                                     <p><strong>№</strong></p>
                                  </td>
                                  <td>
                                     <p><strong>Наименование</strong></p>
                                  </td>
                                  <td>
                                     <p><strong>Кол-во</strong></p>
                                  </td>
                               </tr>
                               <tr>
                                  <td style="height:20.65pt; vertical-align:top; width:23.6pt">
                                     <p>1</p>
                                  </td>
                                  <td style="height:20.65pt; vertical-align:top; width:442.5pt">
                                     <p>«Текущий ремонт мостовых кранов грузоподёмностью 30/10 тонн, 20/10 тонн, установленных на производственных линиях Прессового цеха № 1 и грузоподъёмностью 50/25 тонн, 7,5 тонн, установленных на производственных линиях Прессового цеха № 2».</p>
                                  </td>
                                  <td>
                                     <p>&nbsp; &nbsp; &nbsp; 1</p>
                                  </td>
                               </tr>
                            </tbody>
                         </table>
                        </div>

                       <p><strong>II</strong><strong>. </strong><?=$auction->$price_auction ?></p>
                       <p><strong>I</strong><strong>I</strong><strong>I.&nbsp;</strong> <?= LangHelper::t("Предмет конкурса", "Предмет конкурса", "Предмет конкурса"); ?>:<?=$auction->$predmet_auction ?></p>
                       <p><strong>I</strong><strong>V</strong><strong>.&nbsp; <?= LangHelper::t("Срок представления коммерческих предложений", "Срок представления коммерческих предложений", "Срок представления коммерческих предложений"); ?> –  <?=$auction->$date_auction ?> .</strong></p>
                       <p><strong>V.&nbsp;<?= LangHelper::t("Условия оплаты", "Условия оплаты", "Условия оплаты"); ?> – 1</strong><?=$auction->$payment_auction ?></p>
                       <p> <?= $auction->$subjects ?> </p>
                       <span style="font-weight: bold;">II.   <?= LangHelper::t("Условия поставки", "Условия поставки", "Условия поставки"); ?></span>
                       <p><?=$auction->$conditions ?></p>
                       <span style="font-weight: bold;">III.   <?= LangHelper::t("Условия оплаты", "Условия оплаты", "Условия оплаты"); ?></>
                       <p></p>
                       <p><strong>Условия оплаты – 1</strong>   <?= $auction->$payments ?> </p>
                       <p></p>
                       <span style="font-weight: bold;">IV.  <?= LangHelper::t("Контакты", "Контакты", "Контакты"); ?> </strong>
                     <?=$auction->contacts ?>
                        <div class="d-flex vlojenie">
                         <a href="uploads/auctions/<?=$auction->file?>" download class="download" target="_blank"><?= LangHelper::t("СКАЧАТЬ: Вложение", "СКАЧАТЬ: Вложение", "СКАЧАТЬ: Вложение"); ?></a>
                        </div>
                    </span>
                            </div>
                        </div>
                        <div class="card-body col-md-12 col-lg-12">
                        </div>
                        <!-- end /.product-comment -->
                    </div>
                    <!-- end /.tab-content -->
                </div>

            </div>
            <div class="col-md-4">
                <aside>
                    <div class="konkurs_card">
                        <div class="card-title">
                            <h4 class="konkurs_text">  <?= LangHelper::t("Информация о лоте", "Информация о лоте", "Информация о лоте"); ?></h4>
                        </div>
                        <ul class="infos">
                            <li>
                                <p class="data-label">  <?= LangHelper::t("Дата окончания конкурса ", "Дата окончания конкурса", "Дата окончания конкурса"); ?></p>
                                <span> : </span>
                                <p class="info">
                                    <?=  $auction->end_date ?>
                                </p>
                            </li>
                            <li>
                                <p class="data-label">  <?= LangHelper::t("Место проведения", "Место проведения", "Место проведения"); ?></p>
                                <span> : </span>
                                <p class="info"><?=$auction->$address?></p>
                            </li>
                            <li>
                                <p class="data-label">  <?= LangHelper::t("Дата начала", "Дата начала", "Дата начала"); ?></p>
                                <span> : </span>
                                <p style="color: green;" class="info"><b>
                                        <?=  $auction->start_date ?>  </b></p>
                            </li>
                            <li>
                                <p class="data-label">  <?= LangHelper::t("Дата окончания", "Дата окончания", "Дата окончания"); ?></p>
                                <span> : </span>
                                <p style="color: red;" class="info"><b> <?= $auction->end_date ?> </b></p>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.aside -->
                    <div class="konkurs_card ">
                        <div class="card-title">
                            <h4 class="konkurs_text">  <?= LangHelper::t("Информация о заказчике", "Информация о заказчике", "Информация о заказчике"); ?></h4>
                        </div>
                        <div class="author-infos">
                            <div class="author_avatar">
                                <img src="/img/f2.png" alt="Presenting the broken author avatar :D">
                            </div>
                            <div class="author">
                                <h4>
                                   <?=$auction->user->username?>
                                </h4>
                                <br>
                            </div>
                            <div class="all-konkurs">
                                <a href="<?= yii\helpers\Url::to(['auctions/index']) ?>" class="btn btn--sm btn--round">  <?= LangHelper::t("Все конкурсы", "Все конкурсы", "Все конкурсы"); ?></a>
                                <a href="<?= yii\helpers\Url::to(['document/index']) ?>" class="btn btn--sm btn--round"><?= LangHelper::t("О компании", "О компании", "О компании"); ?></a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <ul class="timer">
        <li><span id="days"></span>  <?= LangHelper::t("ДНЕЙ", "ДНЕЙ", "ДНЕЙ"); ?></li>
        <li><span id="hours"></span>  <?= LangHelper::t("ЧАСЫ", "ЧАСЫ", "ЧАСЫ"); ?></li>
        <li><span id="minutes"></span>  <?= LangHelper::t("МИНУТЫ", "МИНУТЫ", "МИНУТЫ"); ?></li>
        <li><span id="seconds"></span>  <?= LangHelper::t("СЕКУНДЫ", "СЕКУНДЫ", "СЕКУНДЫ"); ?></li>
    </ul>
</div>


<script type="text/javascript">
    // timer js
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date('<?=$auction->start_date?>').getTime(),
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

