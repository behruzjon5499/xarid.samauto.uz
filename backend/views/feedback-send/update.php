<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FeedbackSend */

//$this->title = Yii::t('app', 'Update Feedback Send: {name}', [
//    'name' => $model->title,
//]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedback Sends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="feedback-send-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
