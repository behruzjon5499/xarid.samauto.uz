<?php

use common\helpers\UserauctionsHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserAuctionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Участники аукционов');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-auctions-index">


    <p>
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'price',
                'value' => function (\common\models\UserAuctions $data) {
                    return Html::a($data->price, ['user-auctions/view', 'id' => $data->id]);
                },
                'format' => 'raw',
            ],
//            'file',
            [
                'attribute' => 'status',
                'filter' => \common\helpers\UserauctionsHelper::statusList(),
                'value' => function (\common\models\UserAuctions $model) {
                    return UserauctionsHelper::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            'auction.title_ru',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
</div>
