<?php

use common\helpers\LangHelper;
use common\models\Document;

/* @var $documents Document
 */

$this->title = 'Xarid | Samauto.uz';

$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';

$title = 'title_' . $lang;
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


<div class="simplePage section-gap">
    <div class="small_container">
        <div class="row">
            <div class="col-md-4"> <div class="mTitle" style="display: inline;">
                    <?= $documents->$title ?>

                </div></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">  <div class="item" style="text-align: right; display: inline;">
                    <a href="../../uploads/document/<?=$documents->file?>" style="margin: 0; font-size: 20px;" class="download"><i
                                class="fa fa-flag mx-1"></i><?= LangHelper::t("Прикрепленный файл", "Biriktirilgan fayl", "Attached file"); ?>
                    </a>
                </div></div>
        </div>


        <?= $documents->$signup ?>

    </div>
</div>
<div class="site_bread">
    <div class="centerBox">
        <a href="<?= yii\helpers\Url::to(['site/index']) ?>"><?= LangHelper::t("Главная", "Bosh sahifa", "Homepage"); ?></a>
        <span><?= LangHelper::t("О КОМПАНИИ", "О КОМПАНИИ", "О КОМПАНИИ"); ?></span>
    </div>
</div>