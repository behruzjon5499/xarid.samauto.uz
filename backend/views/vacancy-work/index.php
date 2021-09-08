<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancyWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancy Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-work-index">


    <p>
        <?= Html::a('Create Vacancy Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vacancy_id',
            'work',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
