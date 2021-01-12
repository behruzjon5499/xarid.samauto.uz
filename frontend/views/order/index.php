<?php

use common\helpers\LangHelper;
use common\models\Auctions;

/* @var $order \common\models\Order
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


<style>
    tr td{
        text-align: center;
    }
</style>
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
                <th><?= LangHelper::t("Номер", "Номер", "Номер"); ?></th>
                <th><?= LangHelper::t("Дата подачи", "Дата подачи", "Дата подачи"); ?></th>
                <th><?= LangHelper::t("Наименование конкурса", "Наименование конкурса", "Наименование конкурса"); ?></th>
                <th><?= LangHelper::t("Раздел", "Раздел", "Раздел"); ?> </th>
                <th><?= LangHelper::t("Срок", "Срок", "Срок"); ?></th>
                <th><?= LangHelper::t("Покупатель", "Покупатель", "Покупатель"); ?></th>
                <th><?= LangHelper::t("Компания", "Компания", "Компания"); ?> </th>
            </tr>
            </thead>
            <?php foreach($order as $o):?>
            <tbody>
            <tr onclick="location.href='<?= yii\helpers\Url::to(['order/view','id'=>$o->id
            ]) ?>'">
                <td><?= $o->id ?></td>
                <td><?= $o->start_date ?></td>
                <td><?= $o->$title ?></td>
                <td><?= $o->razdel ?></td>
                <td><?= $o->end_date ?></td>
                <td><?= $o->user->username ?></td>
                <td><?= $o->company->$title ?></td>
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
