<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use common\helpers\LangHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="sp-wrapper">

    <div class="login-page" style="max-width: 540px">
        <header>
            <?= LangHelper::t("Вход", "Вход", "Вход"); ?>
        </header>
        <?php
        $form = ActiveForm::begin([
            'id' => 'feedback-form',
            'options' => ['class' => 'content'],
        ]); ?>
            <label>
                <p><?= LangHelper::t("Электронная почта", "Электронная почта", "Электронная почта"); ?></p>
                <?= $form->field($model, 'email')->textInput(['rows' => 6, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Введите ваше email')])->label(false); ?>

            </label>
            <label>
                <p><?= LangHelper::t("Пароль", "Пароль", "Пароль"); ?></p>
                <?= $form->field($model, 'password')->passwordInput(['rows' => 6,  'class' => 'form-control', 'placeholder' => Yii::t('app', 'Введите ваше password')])->label(false); ?>

            </label>
        <?= Html::submitButton(Yii::t('app', 'Вход'), ['class' => 'btn']) ?>

        <?php ActiveForm::end(); ?>
        <div class="forget-pass">
            <a href="<?= yii\helpers\Url::to(['site/request-password-reset']) ?>" data-toggle="modal" data-target="#forget-pass"> <?= LangHelper::t("Забыл пароль?", "Забыл пароль?", "Забыл пароль?"); ?> </a> <span>|</span>
            <a href="<?= yii\helpers\Url::to(['site/signup']) ?>"> <?= LangHelper::t("Регистрация", "Регистрация", "Регистрация"); ?></a>
        </div>
    </div>

</div>


