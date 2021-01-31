<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Auctions */

$this->title = Yii::t('app', 'Обновить аукциона', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Аукционы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auctions-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
