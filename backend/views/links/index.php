<?php

use common\models\Links;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \common\models\LinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="links-index">


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
            [
                'attribute' => 'title',
                'value' => function (Links $model) {
                    return Html::a($model->title, ['links/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'icon',
        ],
    ]); ?>
        </div>
    </div>

</div>
