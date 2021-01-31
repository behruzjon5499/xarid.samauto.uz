<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionAnswer */

$this->title = Yii::t('app', 'Добавить FAQ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'FAQ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-answer-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
