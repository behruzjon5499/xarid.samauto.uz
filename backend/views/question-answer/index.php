<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\QuestionAnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::t('app', 'Добавить FAQ');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-answer-index">

    <p>
        <?= Html::a(Yii::t('app', 'Добавить FAQ'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="body-box">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'question_ru',
                'value' => function (\common\models\QuestionAnswer $model) {
                    return Html::a($model->question_ru, ['question-answer/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
//            'question_ru',
////            'question_uz',
//            'question_en',
            [
                'attribute' => 'answer_ru',
                'value' => function (\common\models\QuestionAnswer $model) {
                    return Html::a($model->answer_ru, ['question-answer/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
//            'answer_ru',
            //'answer_uz',
            //'answer_en',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>

</div>
