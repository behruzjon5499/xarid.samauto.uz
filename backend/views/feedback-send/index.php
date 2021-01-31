<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FeedbackSendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Отправка ответа');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-send-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="body-box">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title:ntext',
                    [
                        'attribute' => 'feedback.full_name',
                        'value' => function (\common\models\FeedbackSend $model) {
                            return Html::a($model->feedback->full_name, ['feedback/view', 'id' => $model->feedback->id]);
                        },
                        'format' => 'raw',
                    ],
                    'created_at:date',
                    'updated_at:date',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
