<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'again_password')->passwordInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_company')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email_company')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone_company')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-md-6">

        <?= $form->field($model, 'address_company')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'sertifacation')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'litsenziya')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'role')
            ->dropDownList(['1'=>'Админ' , '2'=>'Менеджер', '3'=>'User'] ,
                $param = ['options' => [$model->status => ['Selected' => true]]]
            );
        ?>

        <?= $form->field($model, 'check')->textInput(['maxlength' => true]) ?>

    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
