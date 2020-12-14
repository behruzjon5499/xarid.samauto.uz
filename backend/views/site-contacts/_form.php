<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteContacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-contacts-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>
    </div>
</div>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
