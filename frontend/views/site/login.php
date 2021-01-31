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
<?php
if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success" style="margin-top: 100px !important;">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="sp-wrapper">

    <div class="login-page" style="max-width: 540px">
        <header>
            <?= LangHelper::t("Вход", "Kirish", "Login"); ?>
        </header>
        <?php
        $form = ActiveForm::begin([
            'id' => 'feedback-form',
            'options' => ['class' => 'content'],
        ]); ?>
            <label>
                <p><?= LangHelper::t("Электронная почта", "Elektron pochta", "E-mail"); ?></p>
                <?= $form->field($model, 'email')->textInput(['rows' => 6, 'class' => 'form-control', 'placeholder' => LangHelper::t("Введите адрес электронной почты ", "Elektron pochta manzilingizni kiriting", "Enter your E-mail")])->label(false); ?>

            </label>
            <label>
                <p><?= LangHelper::t("Пароль", "Parol", "Password"); ?></p>
                <?= $form->field($model, 'password')->passwordInput(['rows' => 6,  'class' => 'form-control', 'placeholder' =>LangHelper::t("Введите ваш пароль", "Parolingizni kiriting", " Enter your password")])->label(false); ?>

            </label>
        <?= Html::submitButton(LangHelper::t("Вход", "Kirish", "Login"), ['class' => 'btn']) ?>

        <?php ActiveForm::end(); ?>
        <div class="forget-pass">
            <a href="<?= yii\helpers\Url::to(['site/request-password-reset']) ?>" > <?= LangHelper::t("Забыл пароль?", "Parolni unutdingizmi?", "Forgot your "); ?> </a> <span>|</span>
            <a href="<?= yii\helpers\Url::to(['site/signup']) ?>"> <?= LangHelper::t("Регистрация", "Ro'yxatdan o'tish", "Registration"); ?></a>
        </div>
    </div>

</div>


