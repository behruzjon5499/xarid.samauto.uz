<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="body-box">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'user_id',
                    'title_ru:ntext',
//            'title_uz:ntext',
//            'title_en:ntext',
                    //'razdel',
                    //'file',
                    //'obyom',
                    'company_id',
                    //'address_ru:ntext',
                    //'address_uz:ntext',
                    //'address_en:ntext',
                    //'start_price',
                    //'next_price',
                    //'start_date',
                    //'end_date',
                    //'description_ru:ntext',
                    //'description_uz:ntext',
                    //'description_en:ntext',
                    //'contacts_auction_ru:ntext',
                    //'contacts_auction_uz:ntext',
                    //'contacts_auction_en:ntext',
                    //'price_auction_ru:ntext',
                    //'price_auction_uz:ntext',
                    //'price_auction_en:ntext',
                    //'predmet_auction_ru:ntext',
                    //'predmet_auction_uz:ntext',
                    //'predmet_auction_en:ntext',
                    //'date_auction_ru:ntext',
                    //'date_auction_uz:ntext',
                    //'date_auction_en:ntext',
                    //'payment_auction_ru:ntext',
                    //'payment_auction_uz:ntext',
                    //'payment_auction_en:ntext',
                    //'payments_ru:ntext',
                    //'payments_uz:ntext',
                    //'payments_en:ntext',
                    //'conditions_ru:ntext',
                    //'conditions_uz:ntext',
                    //'conditions_en:ntext',
                    //'subjects_ru:ntext',
                    //'subjects_uz:ntext',
                    //'subjects_en:ntext',
                    //'contacts:ntext',
                    //'status',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>


</div>
