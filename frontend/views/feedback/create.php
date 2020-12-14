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
            <header><h2><?= LangHelper::t("Обратная связь", "Обратная связь", "Обратная связь"); ?></h2></header>
        </div>

        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput1"><?= LangHelper::t("Введите ваше имя", "Введите ваше имя", "Введите ваше имя"); ?>
                <span class="req">*</span></label>
            <?= $form->field($model, 'full_name')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput1', 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Введите ваше имя')])->label(false); ?>

        </div>
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput2"><?= LangHelper::t("Введите Ваш e-mail", "Введите Ваш e-mail", "Введите Ваш e-mail"); ?>
                <span class="req">*</span></label>
            <?= $form->field($model, 'email')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput2', 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Введите Ваш e-mail')])->label(false); ?>

        </div>
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput3"><?= LangHelper::t("Компания", "Компания", "Компания"); ?></label>
            <?= $form->field($model, 'company')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput3', 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Компания')])->label(false); ?>
        </div>
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput4"><?= LangHelper::t("Телефон", "Телефон", "Телефон"); ?></label>
            <?= $form->field($model, 'phone')->textInput(['rows' => 6, 'id' => 'exampleFormControlInput4', 'class' => 'form-control', 'placeholder' => Yii::t('app', '+998')])->label(false); ?>

        </div>
        <div class="form-group col-sm-12">
            <label for="exampleFormControlTextarea7"><?= LangHelper::t("Обращения", "Обращения", "Обращения"); ?> </label>
            <?= $form->field($model, 'description')->textarea(['rows' => 6, 'id' => 'exampleFormControlInput7', 'class' => 'form-control'])->label(false); ?>
        </div>
    </div>

    <div class="form-group" style="display: flex; margin-bottom: 50px;">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'ButtonBox_2','style'=>'margin-top: 12px;']) ?>
<!--        <a href=" class="ButtonBox_2" style="margin-top: 12px"> <svg viewBox="0 0 16 14" width="100%" height="100%">-->
<!--            <path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path>-->
<!--        </svg>-->
<!--        </a>-->
    </div>


    <!--        <div  style="display: flex;margin-bottom: 50px;">-->
    <!--            <a href="#" class="ButtonBox_2" style="margin-top: 12px">-->
    <!--                Отправить-->
    <!--                <svg viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>-->
    <!--            </a>-->
    <!--        </div>-->


    <?php ActiveForm::end(); ?>
</div>


<div class="site_bread">
    <div class="centerBox">
        <a href="index.html">ГЛАВНАЯ</a>
        <span>Вопрос-ответ</span>
    </div>
</div>

