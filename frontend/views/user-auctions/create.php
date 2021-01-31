<?php

use common\helpers\LangHelper;
use common\models\Auctions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $auction Auctions
 * @var $auction Auctions
 * @var $next_price Auctions
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

<div class="sp-wrapper" style="background-color: #F7F7F7;padding-top: 80px;padding-bottom: 80px;">
    <div class="container">
<?php
        if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
        <?php endif; ?>
        <?php
        $form = ActiveForm::begin([
        'id' => 'feedback-form',
        'options' => ['class' => 'create-auction form-group'],
        ]); ?>

            <div class="create-item">
                <p><?= LangHelper::t("Предложенная сумма", "Taklif qilingan narx", "Amount offered"); ?></p>
                <?= $form->field($model, 'price')->textInput(['rows' => 6,'min'=> '0', 'readonly'=>'readonly','class' => 'form-item form-control', 'value' =>$next_price , 'placeholder' => LangHelper::t("сум", "so'm", "sum")])->label(false); ?>

            </div>
        <div class="create-footer">
            <?= Html::submitButton(LangHelper::t("Разместить", "Joylashtirish", "Place"), ['class' => 'btn-save']) ?>
                <button class="btn-cancel" type="button" onclick="location.href='order-item.html'"><i class="fa fa-ban"></i><?= LangHelper::t("Отмена", "Bekor qilish", "Cancel"); ?></button>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="site_bread">
    <div class="centerBox">
        <a href="<?= yii\helpers\Url::to(['site/index']) ?>"><?= LangHelper::t("Главная", "Bosh sahifa", "Homepage"); ?></a>
        <span> <?= LangHelper::t("Конкурсы на продажи", "Onlayn savdolar", "Contests for sale"); ?></span>
    </div>
</div>

