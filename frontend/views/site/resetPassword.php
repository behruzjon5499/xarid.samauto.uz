<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use common\helpers\LangHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password" style="padding: 100px 100px; text-align: center;">
    <h1><?= LangHelper::t("Восстановление пароля", "Parolni tiklash", "Reset password"); ?></h1>

    <p><?= LangHelper::t("Пожалуйста введите свой новый пароль ", "Iltimos yangi parolni kiriting", "Please choose your new password"); ?></p>

    <div class="row">
        <div class="col-md-3">  </div>
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton( LangHelper::t("Сохранить", "Saqlash", "Save") , ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3">  </div>
    </div>
</div>
