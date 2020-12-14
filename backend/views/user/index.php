<?php

use common\helpers\UserHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


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
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'username',
                'value' => function (\common\models\User $model) {
                    return Html::a($model->username, ['user/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],

            'email:email',
            [
                'attribute' => 'phone',
                'value' => function (\common\models\User $model) {
                    return Html::a($model->phone, ['user/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],

            [
                'attribute' => 'role',
                'filter' => UserHelper::statusList(),
                'value' => function (\common\models\User $model) {
                    return UserHelper::statusLabel($model->role);
                },
                'format' => 'raw',
            ],
            'title_company',
            //'email_company:email',
            //'phone_company',
            //'address_company:ntext',
            //'sertifacation',
            //'litsenziya',
            //'role',
            //'zametka',
            //'check',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>

</div>
