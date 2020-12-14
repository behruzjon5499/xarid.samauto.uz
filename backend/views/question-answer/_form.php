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
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabLang_14" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tabLang_24" data-toggle="tab" aria-expanded="true">UZ</a></li>
            <li class=""><a href="#tabLang_34" data-toggle="tab" aria-expanded="true">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabLang_14">

                <?= $form->field($model, 'question_ru')->textInput(['rows' => 14]) ?>
                <?= $form->field($model, 'answer_ru')->textarea(['rows' => 14]) ?>

            </div>
            <div class="tab-pane " id="tabLang_24">

                <?= $form->field($model, 'question_uz')->textInput(['rows' => 14]) ?>
                <?= $form->field($model, 'answer_uz')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_34">
                <?= $form->field($model, 'question_en')->textInput(['rows' => 14]) ?>
                <?= $form->field($model, 'answer_en')->textarea(['rows' => 14]) ?>

            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
