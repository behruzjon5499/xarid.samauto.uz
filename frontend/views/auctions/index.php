<?php

use common\helpers\LangHelper;
use common\models\Auctions;

/* @var $auctions Auctions
 */

$this->title = 'Xarid | Samauto.uz';

$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';

$title = 'title_' . $lang;
$address = 'address_' . $lang;
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
    <div class="container">
        <div class="mTitle aos-init aos-animate" data-aos="fade-right">Конкурсы на продажи</div>
        <div class="table_filter d-flex">
            <section class="my-auctions">
                <a href="my-auction.html">Мои Аукционы: 0</a>
                <a href="#" style="margin-left: 15px;" data-toggle="modal" data-target="#info_modal">Полезно знать</a>
            </section>
        </div>


        <table id="auction_table" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>  <?= LangHelper::t("id", "id", "id"); ?></th>
                <th><?= LangHelper::t("Дата начала", "Дата начала", "Дата начала"); ?></th>
                <th><?= LangHelper::t("Наименование", "Наименование", "Наименование"); ?></th>
                <th><?= LangHelper::t("Местонахождение", "Местонахождение", "Местонахождение"); ?></th>
                <th><?= LangHelper::t("Объем", "Объем", "Объем"); ?></th>
                <th><?= LangHelper::t("Стартовая цена", "Стартовая цена", "Стартовая цена"); ?></th>
                <th><?= LangHelper::t("Текущая цена", "Текущая цена", "Текущая цена"); ?></th>
                <th><?= LangHelper::t("Компания", "Компания", "Компания"); ?> </th>
                <th><?= LangHelper::t("Дата окончания", "Дата окончания", "Дата окончания"); ?></th>
            </tr>
            </thead>
            <?php foreach($auctions as $auction):?>
            <tbody>
            <tr onclick="location.href='<?= yii\helpers\Url::to(['auctions/view','id'=>$auction->id
            ]) ?>'">
                <td><?= $auction->id ?></td>
                <td><?=  $auction->start_date ?></td>
                <td><?= $auction->$title ?></td>
                <td><?= $auction->$address ?></td>
                <td><?= $auction->obyom ?></td>
                <td><?= $auction->start_price ?></td>
                <td><?= $auction->next_price ?></td>
                <td><?= $auction->company->$title ?></td>
                <td><?= $auction->end_date ?></td>
            </tr>
            </tbody>

            <?php endforeach;?>
            <!--         <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>  ёёё
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> -->
        </table>

    </div>
</div>

<div class="site_bread">
    <div class="centerBox">
        <a href="index.html">ГЛАВНАЯ</a>
        <span>Конкурсы на продажи</span>
    </div>
</div>
