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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'title_ru:ntext',
            'title_uz:ntext',
            'title_en:ntext',
            'file',
            'obyom',
            'company_id',
            'address',
            'start_price',
            'start_date',
            'end_date',
            'description_ru:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'phone',
            'email:email',
            'inn',
            'mfo',
            'account_number',
            'bank',
            'status',
        ],
    ]) ?>

</div>
