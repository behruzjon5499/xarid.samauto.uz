<?php

use kartik\datetime\DateTimePicker;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

\backend\assets\AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $model_work common\models\VacancyStudy */
/* @var $model_study common\models\VacancyWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, "nation")
                    ->dropDownList([
                        "Uzbek" => "Uzbek",
                        "Russian" => "Russian",
                        "English" => "English",
                    ],
                        $param = ['options' => [$model->isNewRecord ? 1 : $model->nation => ['Selected' => true]]]
                    );
                ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99-999-9999',
            ]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?php
            $model->birth_day = $model->isNewRecord ? date('Y-m-d',  time() ): $model->birth_day;
            echo '<label class="control-label">Birth day</label>' . \kartik\date\DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'birth_day',
                    'name' => 'birth_day',
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'value' => date('yyyy-mm-dd'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);
            ?>
        </div>
    </div>


    <div class="row">
        <h1 style="text-align: center;">Studies</h1>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?= $form->field($model, 'Study')->widget(MultipleInput::className(), [
        'min' => 1,
        'max' => 4,
        'columns' => [
            [
                'name'  => 'id',
                'type' => 'hiddenInput',
            ],
            [
                'name'  => 'university',
                'title' => 'ўқиш жойи',
                'type' => 'textInput',

            ],
            [
                'name'  => 'end_year',
                'title' => 'тамомлаган йили',
                'type' => 'textInput',
            ],
             [
                'name'  => 'type',
                'title' => 'ўқиш маълумоти',
                 'type'  => MultipleInputColumn::TYPE_DROPDOWN,
                 'items' =>  [
                     'O`rta Maxsus' => 'O`rta Maxsus',
                     'Bakalavr' => 'Bakalavr',
                     'Magistr' => 'Magistr',
                 ],

            ],

        ]
        ])->label(false);?>
        </div>
        <div class="col-md-2"></div>

    </div>

    <div class="row">
        <h1 style="text-align: center;">Works</h1>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?= $form->field($model, 'Work')->widget(MultipleInput::className(), [
                'min' => 1,
                'max' => 4,
                'columns' => [
                    [
                        'name'  => 'id',
                        'type' => 'hiddenInput',
                    ],
                    [
                        'name'  => 'work',
                        'title' => 'Work place',
                        'type' => 'textInput',

                    ],
                    [
                        'name'  => 'start_date',
                        'type'  => \kartik\date\DatePicker::className(),
                        'title' => 'Start Date',
                        'value' =>  $model->isNewRecord ? date('Y-m-d',  time() ): $model->Study['start_date'],

                        'options' => [
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]
                    ],
                    [
                        'name'  => 'end_date',
                        'type'  => \kartik\date\DatePicker::className(),
                        'title' => 'End Date',
                        'value' =>  $model->isNewRecord ? date('Y-m-d',  time() ): $model->Study['end_date'],
                        'options' => [
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]
                    ],
                ]
            ])->label(false);?>
        </div>
        <div class="col-md-2"></div>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
