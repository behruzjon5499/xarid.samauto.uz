<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'order_id')->textInput() ?>

            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 form-group">
                <div>Загрузить файл с характеристиками</div>

                    <?= $form->field($model, 'file1')->fileInput(['class'=> 'file','id'=> 'img_file'])->label( false) ?>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12 form-group">
                <div>Загрузить файл с характеристиками</div>

                    <?= $form->field($model, 'file2')->fileInput(['class'=> 'file','id'=> 'img_file'])->label(false) ?>

            </div>


        </div>
        <div class="col-md-6">

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
