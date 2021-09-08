<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacancyStudy */

$this->title = 'Update Vacancy Study: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacancy-study-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
