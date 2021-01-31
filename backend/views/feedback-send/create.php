<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FeedbackSend */

//$this->title = Yii::t('app', 'Create Feedback Send');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Отправка ответа'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-send-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
