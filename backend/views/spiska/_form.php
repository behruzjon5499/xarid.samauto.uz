<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Spiska */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spiska-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'table_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
