<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Добавить контактов');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <p>
        <?= Html::a(Yii::t('app', 'Добавить контактов'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'title_ru',
                'value' => function (\common\models\Contacts $model) {
                    return Html::a($model->title_ru, ['contacts/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
//            'title_uz',
//            'title_en',
            [
                'attribute' => 'phone1',
                'value' => function (\common\models\Contacts $model) {
                    return Html::a($model->phone1, ['contacts/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            //'phone2',
            'address_ru',
            //'address_uz',
            //'address_en',
            'email:email',
            //'home_phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>

</div>
