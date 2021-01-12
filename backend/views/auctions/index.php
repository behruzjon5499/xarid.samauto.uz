<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuctionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auctions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auctions-index">


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

                    'id',
                    'user_id',
                    'title_ru:ntext',
//                    'title_uz:ntext',
//                    'title_en:ntext',
                    //'file',
                    //'obyom',
                    //'company_id',
                    //'address',
                    'start_price',
                    'start_date',
                    //'end_date',
                    //'description_ru:ntext',
                    //'description_uz:ntext',
                    //'description_en:ntext',
                    //'phone',
                    //'email:email',
                    //'inn',
                    //'mfo',
                    //'account_number',
                    //'bank',
                    //'status',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
