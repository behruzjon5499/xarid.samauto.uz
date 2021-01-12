<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_uz') ?>

    <?= $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'razdel') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'start_price') ?>

    <?php // echo $form->field($model, 'next_price') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'description_uz') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'predmet_order_ru') ?>

    <?php // echo $form->field($model, 'predmet_order_uz') ?>

    <?php // echo $form->field($model, 'predmet_order_en') ?>

    <?php // echo $form->field($model, 'delivery_order_ru') ?>

    <?php // echo $form->field($model, 'delivery_order_uz') ?>

    <?php // echo $form->field($model, 'delivery_order_en') ?>

    <?php // echo $form->field($model, 'payment_order_ru') ?>

    <?php // echo $form->field($model, 'payment_order_uz') ?>

    <?php // echo $form->field($model, 'payment_order_en') ?>

    <?php // echo $form->field($model, 'contacts_order_ru') ?>

    <?php // echo $form->field($model, 'contacts_order_uz') ?>

    <?php // echo $form->field($model, 'contacts_order_en') ?>

    <?php // echo $form->field($model, 'price_auction_ru') ?>

    <?php // echo $form->field($model, 'price_auction_uz') ?>

    <?php // echo $form->field($model, 'price_auction_en') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'mfo') ?>

    <?php // echo $form->field($model, 'account_number') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
