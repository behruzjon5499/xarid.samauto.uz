<?php

use common\helpers\LangHelper;
use common\models\Auctions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $auction Auctions
 * @var $auction Auctions
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
                <p>Предложенная сумма</p>
                <?= $form->field($model, 'price')->textInput(['rows' => 6,'min'=> '0', 'class' => 'form-item form-control', 'placeholder' => Yii::t('app', 'Тыс. сум')])->label(false); ?>

            </div>
            <div class="create-item">
                <p>Коммерческое предложение</p>
                <?= $form->field($model, 'file1')->fileInput(['class'=>'form-item form-control'])->label(false) ?>
                     </div>


        <div class="create-footer">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn-save']) ?>
<!--                <button class="btn-save" type="button" onclick="location.href='my-tenders.html'"><i class="fa fa-floppy-o"></i>Сохранить</button>-->
                <button class="btn-cancel" type="button" onclick="location.href='order-item.html'"><i class="fa fa-ban"></i>Отмена</button>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="site_bread">
    <div class="centerBox">
        <a href="index.html">ГЛАВНАЯ</a>
        <a href="order.html">Конкурсы на закупки</a>
        <span>Мои тендеры</span>
    </div>
</div>

