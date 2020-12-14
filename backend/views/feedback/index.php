<?php

use common\helpers\FeedbackHelper;
use common\models\Feedback;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

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
                'attribute' => 'full_name',
                'value' => function (Feedback $model) {
                    return Html::a($model->full_name, ['feedback/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'company',
            'email:email',
            [
                'attribute' => 'phone',
                'value' => function (Feedback $model) {
                    return Html::a($model->phone, ['feedback/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            //'description:ntext',
            [
                'attribute' => 'status',
                'filter' => FeedbackHelper::statusList(),
                'value' => function (\common\models\Feedback $model) {
                    return FeedbackHelper::statusLabel($model->status);
                },
                'format' => 'raw',
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>

</div>
