<?php


use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

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
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label('title ru') ?>
                    <?= $form->field($model, 'address_ru')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'ru',
                        ])
                    ])->label('Address') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="uz">
                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label('title uz') ?>
                    <?= $form->field($model, 'address_uz')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                                'language' => 'uz'])
                    ])->label('Address') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="en">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label('title en') ?>
                    <?= $form->field($model, 'address_en')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                                'language' => 'en'])
                    ])->label('Address') ?>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'home_phone')->textInput(['maxlength' => true]) ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
