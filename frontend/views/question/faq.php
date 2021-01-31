<?php

use common\helpers\LangHelper;
use common\models\QuestionAnswer;

/* @var $questions QuestionAnswer
 */

$this->title = 'Xarid | Samauto.uz';

$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';

$title = 'title_' . $lang;
$answer = 'answer_' . $lang;
$question = 'question_' . $lang;
$text = 'text_' . $lang;
$name = 'name_' . $lang;
$descr = 'descr_' . $lang;
$link = 'link_' . $lang;
$material = 'material_' . $lang;

 ?>
<div class="faqInside section-gap">
    <div class="small_container">
        <div class="mTitle aos-init aos-animate" data-aos="fade-right"><?= LangHelper::t("ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ", "Ko'p beriladigan savollar", "Frequently asked questions"); ?></div>
        <div class="mTitle2 aos-init aos-animate" data-aos="fade-right"><?= LangHelper::t("ПРОЦЕСС ПОКУПКИ", "ПРОЦЕСС ПОКУПКИ", "ПРОЦЕСС ПОКУПКИ"); ?></div>
        <div class="questions aos-init aos-animate" data-aos="fade-right">

            <?php foreach ($questions as $q): ?>
            <?php if($q->id == 1) {?>
                <div class="item">
                    <div class="head">
                        <?= $q->$question ?>
                        <div class="arrow">
                            <img src="/img/down-chevron.svg">
                        </div>
                    </div>
                    <div class="body shoow" style="display: block;">
                        <div><p>    <?= $q->$answer ?>  </p></div>
                    </div>
                </div>
            <?php } else { ?>

                 <div class="item">
                    <div class="head">
                        <?= $q->$question ?>
            <div class="arrow">
                <img src="/img/down-chevron.svg">
            </div>
        </div>
        <div class="body" style="display: none;">
            <div><p>    <?= $q->$answer ?>  </p></div>
        </div>
    </div>


                <?php } endforeach; ?>

        </div>
    </div>
</div>

<div class="site_bread">
    <div class="centerBox">
        <a href="<?= yii\helpers\Url::to(['site/index']) ?>"> <?= LangHelper::t("Главная", "Bosh sahifa", "Homepage"); ?></a>
        <span><?= LangHelper::t("О Компания", "Kompaniya haqida", "About Company"); ?></span>
    </div>
</div>


