<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Document */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="document-view">


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
            [
                'attribute' => 'file',
                'label' => 'File',
                'value' => function ($model) {
                    return Html::a('Download The File',  '../../uploads/document/' . $model->file, ['class' => 'btn btn-primary', 'download'=>'']);
                },
                'format' => 'raw',
            ],
            'title_ru:ntext',
            'title_uz:ntext',
            'title_en:ntext',
            'signup_ru:ntext',
            'signup_uz:ntext',
            'signup_en:ntext',
        ],
    ]) ?>

</div>
