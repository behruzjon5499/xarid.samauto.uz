<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserAuctions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Auctions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        setTimeout(function(){ location.reload() }, 10000);
    }, false);
</script>
<div class="user-auctions-view">


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
            'price',
            'file',
            [
                'attribute' => 'status',
                'value' => \common\helpers\FeedbackHelper::statusLabel($model->status),
                'format' => 'raw',
            ],
            'auction.title_ru',
            'percent'
        ],
    ]) ?>

</div>
