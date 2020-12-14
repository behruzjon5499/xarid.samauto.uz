<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Auctions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auctions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="auctions-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?php if ($model->isWait()):?>
            <?= Html::a(Yii::t('app', 'Active'), ['active', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if($model->isActive()): ?>
            <?= Html::a(Yii::t('app', 'Wait'), ['wait', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>
    <div class="row">

        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [


                ],
            ]) ?>
        </div>
        <div class="col-md-6"></div>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_ru:ntext',
            'title_uz:ntext',
            'title_en:ntext',
            'file',
            'obyom',
            'company_id',
            'address_ru',
            'address_uz',
            'address_en',
            'start_price',
            'next_price',
            'start_date:date',
            'end_date:date',
            'description_ru:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'contacts_auction_ru:ntext',
            'contacts_auction_uz:ntext',
            'contacts_auction_en:ntext',
            'price_auction_ru:ntext',
            'price_auction_uz:ntext',
            'price_auction_en:ntext',
            'predmet_auction_ru:ntext',
            'predmet_auction_uz:ntext',
            'predmet_auction_en:ntext',
            'date_auction_ru:ntext',
            'date_auction_uz:ntext',
            'date_auction_en:ntext',
            'payment_auction_ru:ntext',
            'payment_auction_uz:ntext',
            'payment_auction_en:ntext',
            'payments_ru:ntext',
            'payments_uz:ntext',
            'payments_en:ntext',
            'conditions_ru:ntext',
            'conditions_uz:ntext',
            'conditions_en:ntext',
            'subjects_ru:ntext',
            'subjects_uz:ntext',
            'subjects_en:ntext',
            'contacts:ntext',
            [
                'attribute' => 'status',
                'value' => \common\helpers\AuctionsHelper::statusLabel($model->status),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
