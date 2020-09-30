<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SiteAndLinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Site And Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-and-links-index">


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
//                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'title',
                        'value' => function (\common\models\SiteAndLinks $model) {
                            return Html::a($model->link->title, ['site-and-links/view', 'id' => $model->id]);
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
