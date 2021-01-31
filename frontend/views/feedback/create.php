<?php

use common\helpers\LangHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



?>
<div class="container">
    <?php
    $form = ActiveForm::begin([
        'id' => 'feedback-form',
        'options' => ['class' => 'treatments-page'],
    ]); ?>
    <div class="row">
   <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
        <div class="col-sm-12">
            <header><h2><?= LangHelper::t("Обратная связь", "Qayta aloqa", "Feedback"); ?></h2></header>
        </div>

        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput1"><?= LangHelper::t("Введите ваше имя", " Ismingizni kiriting", "Enter your name"); ?>
                <span class="req">*</span></label>
            <?= $form->field($model, 'full_name')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput1', 'class' => 'form-control', 'placeholder' =>  LangHelper::t("Введите ваше имя", " Ismingizni kiriting", "Enter your name")])->label(false); ?>

        </div>
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput2"><?= LangHelper::t("Введите адрес электронной почты ", "Elektron pochtangizni kiriting", " Please enter your email"); ?>
                <span class="req">*</span></label>
            <?= $form->field($model, 'email')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput2', 'class' => 'form-control', 'placeholder' =>  LangHelper::t("Введите адрес электронной почты ", "Elektron pochtangizni kiriting", " Please enter your email")])->label(false); ?>

        </div>
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput3"><?= LangHelper::t("Компания", "Kompaniya", "Company"); ?></label>
            <?= $form->field($model, 'company')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput3', 'class' => 'form-control', 'placeholder' => LangHelper::t("Компания", "Kompaniya", "Company")])->label(false); ?>
        </div>
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput4"><?= LangHelper::t("Телефон", "Telefon", "Phone"); ?></label>
            <?= $form->field($model, 'phone')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput4', 'class' => 'form-control', 'placeholder' => Yii::t('app', '+998')])->label(false); ?>

        </div>
        <div class="form-group col-sm-12">
            <label for="exampleFormControlTextarea7"><?= LangHelper::t("Обращения", "Murojaat", "Appeal"); ?> </label>
            <?= $form->field($model, 'description')->textarea(['rows' => 6, 'id' => 'exampleFormControlInput7', 'class' => 'form-control'])->label(false); ?>
        </div>
    </div>

    <div class="form-group" style="display: flex; margin-bottom: 50px;">
        <?= Html::submitButton(LangHelper::t("Отправить", " Jo'natish", "Send"), ['class' => 'ButtonBox_2','style'=>'margin-top: 12px;']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="site_bread">
    <div class="centerBox">
        <a href="<?= yii\helpers\Url::to(['site/index']) ?>"><?= LangHelper::t("Главная", "Bosh sahifa", "Homepage"); ?></a>
        <span><?= LangHelper::t("Контакты", "Aloqa", "Contacts"); ?></span>
    </div>
</div>

