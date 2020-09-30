<?php

/* @var $this yii\web\View */

use common\helpers\TextHelper;
use common\helpers\LangHelper;

$this->title = 'Xarid | Samauto.uz';

$lang = Yii::$app->session->get('lang');
if($lang=='') $lang = 'ru';

$title = 'title_' . $lang;
$text = 'text_' . $lang;
$name = 'name_' . $lang;
$descr = 'descr_' . $lang;
$link = 'link_' . $lang;
$material = 'material_' . $lang;

?>


<div id="demo-1" style="height: 100vh; position: relative;" data-zs-src='["/img/1.jpg", "/img/2.jpg"]' data-zs-overlay="dots" class="zs-enabled overlay-dots"></div>

<!--<div id="demo-1" style="height: 100vh; position: relative;" data-zs-src="[&quot;/img/1.jpg&quot;, &quot;/img/2.jpg&quot;]" data-zs-overlay="dots" class="zs-enabled overlay-dots"><div class="zs-slideshow"><div class="zs-slides"><div class="zs-slide zs-slide-0" style="background-image: url('/img/1.jpg ');"></div><div class="zs-slide zs-slide-1 active" style="background-image: url('/img/2/jpg'); transition: transform 8000ms ease-out 0s, opacity 800ms ease 0s; opacity: 1; transform: scale(1, 1); z-index: 2;"></div></div><div class="zs-bullets"><div class="zs-bullet zs-bullet-0"></div><div class="zs-bullet zs-bullet-1 active"></div></div></div></div>-->

<div class="sp-wrapper" style="margin-top: 0">
    <div class="buy-sale">
        <a href="order.html" style="background-image: url('/img/partnership-agreement.jpg');">
            <div class="buy-sale_text">
                <div class="buy-sale_bg"></div>
                <img src="/img/buy.png">
                <h1> <?= LangHelper::t("Конкурсы на закупки", "Конкурсы на закупки", "Конкурсы на закупки"); ?></h1>
            </div>
        </a>
        <a href="auction.html" style="background-image: url('/img/2.png');">
            <div  class="buy-sale_text">
                <div class="buy-sale_bg"></div>
                <img src="/img/sell.png">
                <h1><?= LangHelper::t("Конкурсы на продажи", "Конкурсы на продажи", "Конкурсы на продажи"); ?></h1>
    </div>
        </a>
    </div>
    <div style="margin-top: 100px;margin-bottom: 100px;">
        <div class="container">
            <section class="order-use">
                <div class="flex-1">
                    <a href="#">
                        <h1><?= LangHelper::t("Порядок пользования", "Порядок пользования", "Порядок пользования"); ?> <br><?= LangHelper::t("порталом", "порталом", "порталом"); ?></h1>
                    </a>
                    <a href="#" class="ButtonBox_2" style="margin-top: 12px">
                        <?= LangHelper::t("перейти", "перейти", "перейти"); ?>
                        <svg viewBox="0 0 16 14" width="100%" height="100%">
                            <path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path>
                        </svg>
                    </a>
                </div>
                <ul class="flex-1 staps">
                    <li>
                        <section>
                            <img src="/img/b2.svg">
                        </section>
                        <span>   <?= LangHelper::t("Зарегистрироваться", "Ro'yxatdan o'tish", "Sign up"); ?>  </span>
                    </li>
                    <li>
                        <section>
                            <img src="/img/b1.svg">
                        </section>
                        <span>Участвовать</span>
                    </li>
                    <li>
                        <section>
                            <img src="/img/b3.svg">
                        </section>
                        <span><?= LangHelper::t("Выиграть", "Выиграть", "Выиграть"); ?> </span>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <div class="mb_parallax_container" id="mb_parallax_one">
        <div style="position: absolute;width: 100%;height: 100%;background: #000;opacity: 0.5;top: 0;z-index: 0"></div>
        <div class="line_top"></div>
        <div class="mb_parallax_overlay" style="z-index: 2;position: relative;">
            <h1>
                29
                <p>
                    <?= LangHelper::t("Активные конкурсы", "Активные конкурсы", "Активные конкурсы"); ?>
                </p>
            </h1>
            <h1>
                1851
                <p>
                    <?= LangHelper::t("Все конкурсы", "Все конкурсы", "Все конкурсы"); ?>
                </p>
            </h1>
            <h1>
                0
                <p>
                    <?= LangHelper::t("Активные аукционы", "Активные аукционы", "Активные аукционы"); ?>
                </p>
            </h1>
            <h1>
                2597
                <p>
                    <?= LangHelper::t("Все аукционы", "Все аукционы", "Все аукционы"); ?>
                </p>
            </h1>
        </div>
        <div class="line_bottom"></div>
    </div>
    <div class="container">
        <div class="FAQ">
            <a href="faq.html">
                <div class="faq-item">
                    <img src="/img/f1.png">
                    <p> <?= LangHelper::t("Часто задаваемые", "Часто задаваемые", "Часто задаваемые"); ?>          <span> <?= LangHelper::t("вопросы", "вопросы", "вопросы"); ?></span></p>
                </div>
            </a>
            <a href="treatments.html">
                <div class="faq-item">
                    <img src="/img/f2.png">
                    <p> <?= LangHelper::t("Спрашивайте", "Спрашивайте", "Спрашивайте"); ?>   <span> <?= LangHelper::t("отвечаем", "отвечаем", "отвечаем"); ?> </span></p>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="modal fade profile-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;"><?=LangHelper::t("Фойдаланувчининг маълумотларини ўзгартириш", "Фойдаланувчининг маълумотларини ўзгартириш", "Фойдаланувчининг маълумотларини ўзгартириш"); ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group">
                    <input type="text" class="form-control" placeholder="Логин">
                    <input type="email" class="form-control" placeholder="Email">
                    <input type="text" class="form-control" placeholder="Телефон">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>SamAuto</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option><?= LangHelper::t("Худуни танланг", "Худуни танланг", "Худуни танланг"); ?></option>
                        <option><?= LangHelper::t("Тошкент шахри", "Тошкент шахри", "Тошкент шахри"); ?></option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= LangHelper::t("Бекор қилиш", "Бекор қилиш", "Бекор қилиш"); ?></button>
                <button type="button" class="btn btn-primary"><?= LangHelper::t("Сақлаш", "Сақлаш", "Сақлаш"); ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade profile-modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= LangHelper::t("Паролни ўзгартириш", "Паролни ўзгартириш", "Паролни ўзгартириш"); ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group">
                    <input type="password" class="form-control" placeholder="Ески паролни киритинг">
                    <input type="password" class="form-control" placeholder="Янги паролни киритинг">
                    <input type="password" class="form-control" placeholder="Янги паролни тасдиқланг">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= LangHelper::t("Бекор қилиш", "Бекор қилиш", "Бекор қилиш"); ?></button>
                <button type="button" class="btn btn-primary"><?= LangHelper::t("Сақлаш", "Сақлаш", "Сақлаш"); ?></button>
            </div>
        </div>
    </div>
</div>

