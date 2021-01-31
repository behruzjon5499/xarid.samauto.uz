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
        <div class="mTitle aos-init aos-animate" data-aos="fade-right"><?= LangHelper::t("Конкурсы на закупки", "Xarid uchun tenderlar", "Contests for purchases"); ?></div>
        <div class="table_filter d-flex">
            <section class="my-auctions">
                <a href="<?= yii\helpers\Url::to(['auctions/index']) ?>"> <?= LangHelper::t("Мои тендеры", "Mening tenderlarim ", "My tenders"); ?></a>
                <a href="<?= yii\helpers\Url::to(['document/index']) ?>" style="margin-left: 15px;" data-toggle="modal" data-target="#info_modal"><?= LangHelper::t("Полезно знать ", "Bilib olgan yaxshi ", "Good to know"); ?></a>
            </section>
        </div>


        <table id="auction_table" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th><?= LangHelper::t("Номер", "Nomer", "Number"); ?></th>
                <th><?= LangHelper::t("Дата подачи", " Joylashtirilgan sana", "Submission date"); ?></th>
                <th><?= LangHelper::t("Наименование тендера ", "Tender nomi", "Tender name"); ?></th>
                <th><?= LangHelper::t("Раздел", "Bo'lim", "Section"); ?> </th>
                <th><?= LangHelper::t("Срок", "Amal qilish muddati", "Validity period"); ?></th>
                <th><?= LangHelper::t("Покупатель", "Xaridor", "Buyer"); ?></th>
                <th><?= LangHelper::t("Компания", "Kompaniya", "Company"); ?> </th>
            </tr>
            </thead>
            <?php foreach($order as $o):?>
            <tbody>
            <tr onclick="location.href='<?= yii\helpers\Url::to(['order/view','id'=>$o->id
            ]) ?>'">
                <td><?= $o->id ?></td>
                <td><?= Yii::$app->formatter->asDate($o->start_date, 'yyyy-MM-dd'); ?></td>
                <td><?= $o->$title ?></td>
                <td><?= $o->razdel ?></td>
                <td><?= Yii::$app->formatter->asDate($o->end_date, 'yyyy-MM-dd'); ?></td>
                <td><?= $o->user->username ?></td>
                <td><?= $o->company->$title ?></td>
            </tr>
            </tbody>

            <?php endforeach;?>

        </table>

    </div>
</div>

<div class="site_bread">
    <div class="centerBox">
        <a href="<?= yii\helpers\Url::to(['site/index']) ?>"><?= LangHelper::t("Главная", "Bosh sahifa", "Homepage"); ?></a>
        <span><?= LangHelper::t("Конкурсы на закупки", "Xarid uchun tenderlar", "Contests for purchases"); ?></span>
    </div>
</div>
