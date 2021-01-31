<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

use common\helpers\LangHelper;
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

    .field-sertificate {
        display: none !important;
    }

    .field-license {
        display: none !important;
    }

    .field-passport {
        display: none !important;
    }

    .form-group {
        /*display: none;*/
        margin-bottom: 0 !important;
    }
</style>
<?php
if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success" style="margin-top: 100px !important;">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="sp-wrapper">

    <div class="container">
        <div class="row registration">
            <div class="col-md-12">
                <div class="select-type">
                    <div class="select-item">
                        <input type="radio" checked="" id="user_type_1" name="user_type">
                        <label for="user_type_1"><?= LangHelper::t("Юридическое лицо", "Yuridik shaxs", "Entity"); ?></label>
                    </div>
                    <div class="select-item">
                        <input type="radio" id="user_type_2" name="user_type">
                        <label for="user_type_2"><?= LangHelper::t("Физическое лицо ", " Jismoniy shaxs", "Individual"); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6 checked_1">
                <div class="login-page">
                    <header>
                        <?= LangHelper::t("Информация о пользователе", " Foydalanuvchi haqida ma'lumot", "User information"); ?>
                    </header>
                    <?php $form = ActiveForm::begin([
                        'id' => 'signup-form',
                        'options' => [
                            'class' => 'content'
                        ]
                    ]); ?>

                    <label>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'form-control', 'style' => 'margin-bottom: 0;', 'placeholder' =>  LangHelper::t("Имя пользователя", "Foydalanuvchi nomi ", "Username")])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Введите адрес электронной почты ", "Elektron pochta manzilini kiriting", "Please enter your email")])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => 255, 'class' => 'form-control', 'data-mask' => '+998(00)-000-00-00', 'placeholder' => Yii::t('app', '+998(XX)-XXX-XX-XX')])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Пароль", "Parol", "Password")])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'again_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Введите ещё раз ", "Qaytadan kiriting", "Enter again")])->label(false); ?>
                    </label>
                    <?= $form->field($model, 'jis_yur')->textInput(['maxlength' => true, 'value' => 1, 'type' => 'hidden', 'class' => 'form-control'])->label(false) ?>

                    <div class="oferta">
                        <?= $form->field($model, 'check')->radio(['onclick' =>
                            'showInternDetails()'])->label(false); ?>
                        <a href="/uploads/22.docx"><?= LangHelper::t("Соглашение о сотрудничестве", "Hamkorlik shartnomasi", "Cooperation agreement"); ?></a>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton(LangHelper::t("Создать аккаунт ", " Hisob ochish", "Additional information"), ['class' => 'btn']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 checked_1">
                <div class="login-page">
                    <header>
                        <?= LangHelper::t("Информация о компании", "Kompaniya haqida ma'lumot ", "Information about the company"); ?>
                    </header>
                    <div class="box" style="padding: 15px 25px;">
                        <label>
                            <?= $form->field($model, 'title_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' =>  LangHelper::t("Название компании", "Kompaniya nomi ", "Company name")])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'email_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' =>  LangHelper::t("Электронный адрес компании", "Kompaniyaning elektron pochta manzili ", "Company email address")])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'phone_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'data-mask' => '+998(00)-000-00-00', 'placeholder' => Yii::t('app', '+998(XX)-XXX-XX-XX')])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'inn')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' =>  LangHelper::t("ИНН", "STIR", "TIN")])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'address_company')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' =>  LangHelper::t("Контакты", "Aloqa", "Contacts")])->label(false); ?>
                        </label>
                        <label class="input-file">
                            <div>
                                <span id="sertificate_text"><?= LangHelper::t("Сертификат (максимальный размер 5 Мб) ", "Sertifikat (maksimal hajmi 5 MB) ", "Certificate (maximum size 5 MB)"); ?></span>
                                <i class="fa fa-upload" aria-hidden="true"></i>
                            </div>
                            <?= $form->field($model, 'file')->fileInput(['maxlength' => 255, 'class' => 'form-control', 'id' => 'sertificate', 'opacity' => 0])->label(false); ?>
                        </label>
                        <label class="input-file">
                            <div>
                                <span id="license_text"><?= LangHelper::t("Лицензия (максимальный размер 5 Мб)", " Litsenziya (maksimal hajmi 5 MB) ", "License (maximum size 5 MB)"); ?></span>
                                <i class="fa fa-upload" aria-hidden="true"></i>
                            </div>
                            <?= $form->field($model, 'file1')->fileInput(['maxlength' => 255, 'class' => 'form-control', 'id' => 'license'])->label(false); ?>
                        </label>
                        <label>
                            <?= $form->field($model, 'zametka')->textInput(['rows' => 8, 'class' => 'form-control', 'placeholder' =>  LangHelper::t("Сообщение", "Xabar", "Message")])->label(false); ?>

                        </label>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>


            <div class="col-md-6 checked_2 d-none">
                <div class="login-page">
                    <header>
                        <?= LangHelper::t("Информация о пользователе", " Foydalanuvchi haqida ma'lumot", "User information"); ?>
                    </header>
                    <?php $form = ActiveForm::begin([
                        'id' => 'signup-form',
                        'options' => [
                            'class' => 'content'
                        ]
                    ]); ?>

                    <label>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'form-control', 'style' => 'margin-bottom: 0;', 'placeholder' =>  LangHelper::t("Имя пользователя", "Foydalanuvchi nomi ", "Username")])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Введите адрес электронной почты ", "Elektron pochta manzilini kiriting", "Please enter your email")])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => 255, 'class' => 'form-control', 'data-mask' => '+998(00)-000-00-00', 'placeholder' => Yii::t('app', '+998(XX)-XXX-XX-XX')])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Пароль", "Parol", "Password")])->label(false); ?>
                    </label>
                    <label>
                        <?= $form->field($model, 'again_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Введите ещё раз ", "Qaytadan kiriting", "Enter again")])->label(false); ?>
                    </label>
                    <?= $form->field($model, 'jis_yur')->textInput(['maxlength' => true, 'value' => 2, 'type' => 'hidden', 'class' => 'form-control'])->label(false) ?>

                    <div class="oferta">
                        <?= $form->field($model, 'check')->radio(['onclick' =>
                            'showInternDetails()'])->label(false); ?>
                        <a href="/uploads/22.docx" ><?= LangHelper::t("Соглашение о сотрудничестве", "Hamkorlik shartnomasi ", "Cooperation agreement"); ?></a>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton( LangHelper::t("Создать аккаунт ", " Hisob ochish", "Additional information"), ['class' => 'btn']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 checked_2 d-none">
                <div class="login-page">
                    <header>
                        <?= LangHelper::t("Дополнительные информации", "Qo'shimcha ma'lumot ", "Additional information"); ?>
                    </header>
                    <div style="padding: 15px 25px;">
                        <label>
                            <?= $form->field($model, 'inn')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("ИНН", "STIR", "TIN")])->label(false); ?>

                        </label>
                        <label>
                            <?= $form->field($model, 'table_number')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => LangHelper::t("Табельный номер", "Tabel raqami", "Personnel Number")])->label(false); ?>

                        </label>
                        <label class="input-file">
                            <div>
                                <span id="passport_text"><?= LangHelper::t("Копия паспорта (максимальный размер 5 Мб)", "Pasport nusxasi (maksimal hajmi 5 MB) ", " Copy of passport (maximum size 5 MB)"); ?></span>
                                <i class="fa fa-upload" aria-hidden="true"></i>
                            </div>
                            <?= $form->field($model, 'file2')->fileInput(['maxlength' => 255, 'class' => 'form-control', 'id' => 'passport'])->label(false); ?>

                        </label>
                        <label>
                            <?= $form->field($model, 'zametka')->textInput(['rows' => 8, 'class' => 'form-control', 'placeholder' => LangHelper::t("Сообщение", "Xabar", "Message")])->label(false); ?>

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

<script src="https://bossanova.uk/jsuites/v3/jsuites.js"></script>

