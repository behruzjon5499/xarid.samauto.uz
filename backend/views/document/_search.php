<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_uz') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'signup_ru') ?>

    <?php // echo $form->field($model, 'signup_uz') ?>

    <?php // echo $form->field($model, 'signup_en') ?>

    <?php // echo $form->field($model, 'support_ru') ?>

    <?php // echo $form->field($model, 'support_uz') ?>

    <?php // echo $form->field($model, 'support_en') ?>

    <?php // echo $form->field($model, 'podacha_ru') ?>

    <?php // echo $form->field($model, 'podacha_uz') ?>

    <?php // echo $form->field($model, 'podacha_en') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
