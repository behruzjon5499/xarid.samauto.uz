<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use common\helpers\LangHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="padding: 100px 100px; text-align: center;">
<div class="site-request-password-reset">
    <h1><?= LangHelper::t("Запросить сброс пароля", "Parolni tiklash so'rovi ", "Request password reset"); ?></h1>

    <p><?= LangHelper::t("Пожалуйста заполните ваш адрес электронной почты. Ссылка на сброс пароля будет отправлена туда ", " Iltimos elektron pochta manzilini to'ldiring. Parolni tiklash uchun link o'sha yerga jo'natiladi ", "Please fill out your E-mail. A link to reset password will be sent there"); ?></p>

    <div class="row">
        <div class="col-md-3">  </div>
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</div>