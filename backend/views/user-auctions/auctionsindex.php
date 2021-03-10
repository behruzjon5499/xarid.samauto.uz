<?php

use yii\grid\GridView;
use yii\helpers\Html;

use common\models\Auctions;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AuctionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auctions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auctions-index">


    <p>
        <?= Html::a(Yii::t('app', 'Send'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="body-box">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'user.username',
                    [
                        'attribute' => 'title_ru',
                        'value' => function (\common\models\Auctions $data) {
                            return Html::a($data->title_ru, ['user-auctions/index-tab', 'id' => $data->id]);
                        },
                        'format' => 'raw',
                    ],
//                    'title_uz:ntext',
//                    'title_en:ntext',
                    //'file',
                    //'obyom',
                    //'company_id',
                    //'address',
                    [
                        'attribute' => 'start_price',
                        'value' => function (\common\models\Auctions $data) {
                            return Html::a($data->start_price, ['user-auctions/index-tab', 'id' => $data->id]);
                        },
                        'format' => 'raw',
                    ],
                    'start_date:date',
//                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
