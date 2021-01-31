<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('app', 'Добавить Вопросы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопросы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
