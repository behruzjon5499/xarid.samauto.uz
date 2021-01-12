<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'title_ru:ntext',
            'title_uz:ntext',
            'title_en:ntext',
            'razdel',
            'file',
            'obyom',
            'company_id',
            'address_ru:ntext',
            'address_uz:ntext',
            'address_en:ntext',
            'start_price',
            'next_price',
            'start_date',
            'end_date',
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
            'status',
        ],
    ]) ?>

</div>
