<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AuctionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auctions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_uz') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'obyom') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <?php // echo $form->field($model, 'address_ru') ?>

    <?php // echo $form->field($model, 'address_uz') ?>

    <?php // echo $form->field($model, 'address_en') ?>

    <?php // echo $form->field($model, 'start_price') ?>

    <?php // echo $form->field($model, 'next_price') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'description_uz') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'contacts_auction_ru') ?>

    <?php // echo $form->field($model, 'contacts_auction_uz') ?>

    <?php // echo $form->field($model, 'contacts_auction_en') ?>

    <?php // echo $form->field($model, 'price_auction_ru') ?>

    <?php // echo $form->field($model, 'price_auction_uz') ?>

    <?php // echo $form->field($model, 'price_auction_en') ?>

    <?php // echo $form->field($model, 'predmet_auction_ru') ?>

    <?php // echo $form->field($model, 'predmet_auction_uz') ?>

    <?php // echo $form->field($model, 'predmet_auction_en') ?>

    <?php // echo $form->field($model, 'date_auction_ru') ?>

    <?php // echo $form->field($model, 'date_auction_uz') ?>

    <?php // echo $form->field($model, 'date_auction_en') ?>

    <?php // echo $form->field($model, 'payment_auction_ru') ?>

    <?php // echo $form->field($model, 'payment_auction_uz') ?>

    <?php // echo $form->field($model, 'payment_auction_en') ?>

    <?php // echo $form->field($model, 'payments_ru') ?>

    <?php // echo $form->field($model, 'payments_uz') ?>

    <?php // echo $form->field($model, 'payments_en') ?>

    <?php // echo $form->field($model, 'conditions_ru') ?>

    <?php // echo $form->field($model, 'conditions_uz') ?>

    <?php // echo $form->field($model, 'conditions_en') ?>

    <?php // echo $form->field($model, 'subjects_ru') ?>

    <?php // echo $form->field($model, 'subjects_uz') ?>

    <?php // echo $form->field($model, 'subjects_en') ?>

    <?php // echo $form->field($model, 'contacts') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
