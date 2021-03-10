<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Auctions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auctions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="auctions-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

        <?php if ($model->isWait()):?>
            <?= Html::a(Yii::t('app', 'Активный'), ['active', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if($model->isActive()): ?>
            <?= Html::a(Yii::t('app', 'В ожидании'), ['wait', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'title_ru:ntext',
            'title_uz:ntext',
            'title_en:ntext',
           [
                'attribute' => 'file',
                'label' => 'File',
                'value' => function ($model) {
                    return Html::a('Download The File',  '../../uploads/auctions/' . $model->file, ['class' => 'btn btn-primary', 'download'=>'']);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'photo',
                'label' => 'Photo',
                'value' => function ($model) {
                    return Html::a('Download The Photo',  '../../uploads/auctions/' . $model->photo, ['class' => 'btn btn-primary', 'download'=>'']);
                },
                'format' => 'raw',
            ],
            'obyom',
//            'size_obyom',
            'company.title_ru',
            'address',
            'start_price',
            'start_date:date',
            'end_date:date',
            'description_ru:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'phone',
            'email:email',
            [
                'attribute' => 'status',
                'value' => \common\helpers\AuctionsHelper::statusLabel($model->status),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
