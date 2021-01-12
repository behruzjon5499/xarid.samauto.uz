<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user.username',
            'title_ru:ntext',
            'title_uz:ntext',
            'title_en:ntext',
            'razdel',
            'file',
            'company.title_ru',
            'address:ntext',
            'start_date:date',
            'end_date:date',
            'description_ru:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'predmet_order_ru:ntext',
            'predmet_order_uz:ntext',
            'predmet_order_en:ntext',
            'delivery_order_ru:ntext',
            'delivery_order_uz:ntext',
            'delivery_order_en:ntext',
            'payment_order_ru:ntext',
            'payment_order_uz:ntext',
            'payment_order_en:ntext',
            'contacts_order_ru:ntext',
            'contacts_order_uz:ntext',
            'contacts_order_en:ntext',
            'inn:ntext',
            'mfo:ntext',
            'account_number:ntext',
            'bank:ntext',
            'status',
        ],
    ]) ?>

</div>
