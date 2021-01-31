<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
/* @var $this yii\web\View */
/* @var $model common\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

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
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label('Заголовок Ru') ?>
                    <?= $form->field($model, 'description_ru')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'ru',
                        ])
                    ])->label('Описание Ru') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="uz">
                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label('Заголовок Uz') ?>
                    <?= $form->field($model, 'description_uz')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'uz'])
                    ])->label('Описание Uz') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="en">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label('Заголовок Eng ') ?>
                    <?= $form->field($model, 'description_en')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'en'])
                    ])->label('Описание Eng') ?>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'inn')->textInput(['rows' => 6]) ?>

        <?= $form->field($model, 'mfo')->textInput(['rows' => 6]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'account_number')->textInput(['rows' => 6]) ?>

        <?= $form->field($model, 'bank')->textInput(['rows' => 6]) ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
