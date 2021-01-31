<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'тендера');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <p>
        <?= Html::a(Yii::t('app', 'Добавить тендера'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="body-box">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'user.username',
                    'title_ru:ntext',

//                    'title_uz:ntext',
//                    'title_en:ntext',
                    //'razdel',
                    //'file',
                    //'company_id',
                    //'address:ntext',
                    //'start_date',
                    //'end_date',
                    //'description_ru:ntext',
                    //'description_uz:ntext',
                    //'description_en:ntext',
                    //'predmet_order_ru:ntext',
                    //'predmet_order_uz:ntext',
                    //'predmet_order_en:ntext',
                    //'delivery_order_ru:ntext',
                    //'delivery_order_uz:ntext',
                    //'delivery_order_en:ntext',
                    //'payment_order_ru:ntext',
                    //'payment_order_uz:ntext',
                    //'payment_order_en:ntext',
                    //'contacts_order_ru:ntext',
                    //'contacts_order_uz:ntext',
                    //'contacts_order_en:ntext',
                    //'price_auction_ru:ntext',
                    //'price_auction_uz:ntext',
                    //'price_auction_en:ntext',
                    //'inn:ntext',
                    //'mfo:ntext',
                    //'account_number:ntext',
                    //'bank:ntext',
                    //'status',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
