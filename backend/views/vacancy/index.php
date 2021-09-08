<?php

use common\helpers\StatusHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">


    <p>
        <?= Html::a('Create Vacancy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'rowOptions' => function (
            $model,
            $key,
            $index,
            $grid
        ) {
            return [
                'id' => $key,
                'ondblclick' => 'location.href="'
                    . Url::to(['view'])
                    . '?id="+(this.id);',
            ];
        },
        'tableOptions' => [
            'class' => 'footable table table-striped table-hover',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'full_name',
            'birth_day',
            'nation',
            'phone',
            //'email:email',
            [
                'attribute' => 'status',
                'value' => function (
                    \common\models\Vacancy $model
                ) {
                    return StatusHelper::statusLabel(
                        $model->status
                    );
                },
                'format' => 'raw',
            ],

        ],
    ]); ?>


</div>
