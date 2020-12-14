<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<style>
    label {
        display: block;
        /*margin-bottom: .5rem;*/
    }

    label.div {
        /*margin-bottom: .5rem;*/

    }
    .field-user-file{
        display: none !important;
    }
    .field-user-file1{
        display: none !important;
    }
    .form-group {
        /*display: none;*/
        margin-bottom: 0 !important;
    }
</style>
<div class="sp-wrapper">

    <div class="container">
        <div class="row registration">
            <div class="col-md-6">
                <div class="login-page">
                    <header>
                        Информация о пользователе
                    </header>
                    <?php $form = ActiveForm::begin([
                        'id' => 'signup-form',
                        'options' => [
                            'class' => 'content'
                        ]
                    ]); ?>

                    <label>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'form-control', 'style' => 'margin-bottom: 0;', 'placeholder' => Yii::t('app', 'Username')])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Введите адрес электронной почты')])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => 255, 'class' => 'form-control', 'data-mask' => '+998(00)-000-00-00', 'placeholder' => Yii::t('app', '+998(XX)-XXX-XX-XX')])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'password')])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'again_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', ' again password')])->label(false); ?>
                    </label>
                    <div class="oferta">
                        <?= $form->field($model, 'check')->radio(['onclick' =>
                            'showInternDetails()'])->label(false); ?>
                        <a href="#" data-toggle="modal" data-target="#oferta">Соглашение о сотрудничестве</a>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Создать аккаунт'), ['class' => 'btn']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-page">
                    <header>
                        Информация о компании
                    </header>
                    <div class="box" style="padding: 15px 25px;">
                        <label>
                            <?= $form->field($model, 'title_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Название компании')])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'email_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Электронный адрес компании')])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'phone_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'data-mask' => '+998(00)-000-00-00', 'placeholder' => Yii::t('app', '+998(XX)-XXX-XX-XX')])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'inn')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'ИНН')])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'address_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Адрес компании')])->label(false); ?>
                        </label>
                        <label class="input-file">
                            <div>Сертификат (максимальный размер 5Мб) <i class="fa fa-upload" aria-hidden="true"></i>
                            </div>
                            <?= $form->field($model, 'file')->fileInput(['maxlength' => 255, 'class' => 'form-control'])->label(false); ?>
                        </label>
                        <label class="input-file">
                            <div>Лицензия (максимальный размер 5Мб) <i class="fa fa-upload" aria-hidden="true"></i>
                            </div>
                            <?= $form->field($model, 'file1')->fileInput(['maxlength' => 255, 'class' => 'form-control'])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'zametka')->textInput(['rows' => 8, 'class' => 'form-control', 'placeholder' => Yii::t('app', 'Message')])->label(false); ?>

                        </label>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    function showInternDetails() {
        $model => check = 1;
    }
</script>

<?php
if ($model->check == true) {
    $form->field($model, 'check')->checkbox();
}
?>


