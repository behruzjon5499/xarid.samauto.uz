<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionAnswerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-answer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'question_ru') ?>

    <?= $form->field($model, 'question_uz') ?>

    <?= $form->field($model, 'question_en') ?>

    <?= $form->field($model, 'answer_ru') ?>

    <?php // echo $form->field($model, 'answer_uz') ?>

    <?php // echo $form->field($model, 'answer_en') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
