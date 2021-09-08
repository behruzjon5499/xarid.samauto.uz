<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancyStudySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancy Studies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-study-index">


    <p>
        <?= Html::a('Create Vacancy Study', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vacancy_id',
            'university',
            'end_year',
            'type',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
