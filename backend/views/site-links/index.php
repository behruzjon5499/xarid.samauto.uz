<?php

use backend\models\SiteLinks;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SiteLinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Site Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-links-index">


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
            [
                'attribute' => 'link_id',
                'value' => function (SiteLinks $model) {
                    return Html::a($model->link->title, ['site-links/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>

</div>
