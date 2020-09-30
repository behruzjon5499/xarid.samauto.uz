<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contacts-view">

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
<div class="row">
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title_ru',
                'title_uz',
                'title_en',
            ],
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'phone1',
                'phone2',
                'email:email',
                'home_phone',
            ],
        ]) ?>
    </div>
</div>



    <?php $address_ru = DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'address_ru',
                'format' => 'raw',
                'label' => false
            ]
        ]
    ]) ?>

    <?php $address_uz = DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'address_uz',
                'format' => 'raw',
                'label' => false
            ]
        ]
    ]) ?>

    <?php $address_en = DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'address_en',
                'format' => 'raw',
                'label' => false
            ]
        ]
    ]) ?>

    <?= \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label' => Yii::t('app', 'Address Ru'),
                'content' => $address_ru,
                'active' => true
            ],
            [
                'label' => Yii::t('app', 'Address Uz'),
                'content' => $address_uz,
            ],
            [
                'label' => Yii::t('app', 'Address En'),
                'content' => $address_en,
            ],
        ]
    ]) ?>

</div>
