<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Отправить ответ'), ['feedback-send/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>


        <?php if ($model->isWait()):?>
            <?= Html::a(Yii::t('app', 'Активный'), ['active', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if($model->isActive()): ?>
            <?= Html::a(Yii::t('app', ' В ожидании'), ['wait', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'company',
            'email:email',
            'phone',
            'description:ntext',
            [
                'attribute' => 'status',
                'value' => \common\helpers\FeedbackHelper::statusLabel($model->status),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
