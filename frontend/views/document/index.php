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
        <div class="mTitle">
            <?= LangHelper::t("Инструкция", "Инструкция", "Инструкция"); ?>
        </div>
        <div class="content">
            <p>
            <?= $documents->$title ?>
            </p>
        </div>
        <ul class="mini-info-list">
            <li class="info-list_first">   <?= LangHelper::t("Для начала зарегистрируйтесь в системе, для этого надо:", "Для начала зарегистрируйтесь в системе, для этого надо:", "Для начала зарегистрируйтесь в системе, для этого надо:"); ?>  </li>

            <?= $documents->$signup ?>

        </ul>
        <ul class="mini-info-list">
            <li class="info-list_first">    <?= LangHelper::t("Подтверждения пользователя", "Подтверждения пользователя", "Подтверждения пользователя"); ?> </li>
            <?= $documents->$support ?>

        </ul>
        <ul class="mini-info-list">
            <li class="info-list_first"> <?= LangHelper::t("Подача предложений", "Подача предложений", "Подача предложений"); ?>  </li>
            <?= $documents->$podacha ?>
        </ul>
    </div>
</div>
<div class="site_bread">
    <div class="centerBox">
        <a href="index.html"> <?= LangHelper::t("ГЛАВНАЯ", "ГЛАВНАЯ", "ГЛАВНАЯ"); ?></a>
        <span><?= LangHelper::t("О КОМПАНИИ", "О КОМПАНИИ", "О КОМПАНИИ"); ?></span>
    </div>
</div>