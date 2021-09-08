<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VacancyStudy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-study-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'vacancy_id')->textInput() ?>

            <?= $form->field($model, 'university')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">  <?= $form->field($model, "end_year")
                    ->dropDownList([
                        2017 => 2017,
                        2018 => 2018,
                        2019 => 2019,
                        2020 => 2020,
                        2021 => 2021,
                    ],
                        $param = ['options' => [$model->isNewRecord ? 1 : $model->end_year => ['Selected' => true]]]
                    );
                ?>

            </div>
            <div class="col-md-12">  <?= $form->field($model, "type")
                    ->dropDownList([
                        0 => "O'rta Maxsus",
                        1 => "Bakalavr",
                        2 => "magistr",
                    ],
                        $param = ['options' => [$model->isNewRecord ? 1 : $model->type => ['Selected' => true]]]
                    );
                ?>

            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
