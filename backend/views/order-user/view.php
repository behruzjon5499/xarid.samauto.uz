<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-user-view">


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
            'order.title_ru',
            'price',
            'ddq',
            [
                'attribute' => 'ddq',
                'label' => 'File',
                'value' => function ($model) {
                    return Html::a('Download The DDQ',  '../../uploads/order-user/' . $model->ddq, ['class' => 'btn btn-primary', 'download'=>'']);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'file',
                'label' => 'File',
                'value' => function ($model) {
                    return Html::a('Download The File',  '../../uploads/order-user/' . $model->file, ['class' => 'btn btn-primary', 'download'=>'']);
                },
                'format' => 'raw',
            ],
            'file',
            'status',
        ],
    ]) ?>

</div>
