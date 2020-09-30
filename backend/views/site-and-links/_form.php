<?php

use common\models\Links;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteAndLinks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-and-links-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'link_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(
                    Links::find()->all(),
                    'id',
                    'title'
                )
            ) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6"></div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
