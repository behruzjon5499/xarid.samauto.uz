<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionAnswer */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="question-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">Русский</a>
                </li>
                <li role="presentation" class=""><a href="#uz" aria-controls="uz" role="tab" data-toggle="tab">Узбекский</a>
                </li>
                <li role="presentation" class=""><a href="#en" aria-controls="en" role="tab" data-toggle="tab">Английский</a>
                </li>
            </ul>

            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane active" id="ru">
                    <?= $form->field($model, 'question_ru')->textInput(['maxlength' => true])->label('question ru') ?>
                    <?= $form->field($model, 'answer_ru')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'ru',
                        ])
                    ])->label('Answer') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="uz">
                    <?= $form->field($model, 'question_uz')->textInput(['maxlength' => true])->label('question uz') ?>
                    <?= $form->field($model, 'answer_uz')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'uz'])
                    ])->label('Answer') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="en">
                    <?= $form->field($model, 'question_en')->textInput(['maxlength' => true])->label('question en') ?>
                    <?= $form->field($model, 'answer_en')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'en'])
                    ])->label('Answer') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
