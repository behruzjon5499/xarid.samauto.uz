<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionAnswer */

$this->title = Yii::t('app', 'Create Question Answer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Question Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-answer-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
