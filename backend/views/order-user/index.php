<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Order Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-user-index">


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

            'id',
            'user.username',
            'order.title_ru',
            'price',
//            'ddq',
            //'file',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div></div>

</div>
