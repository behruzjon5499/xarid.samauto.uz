<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $studies common\models\VacancyStudy */
/* @var $works common\models\VacancyWork */

$this->title = 'Update Vacancy: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacancy-update">


    <?= $this->render('_form', [
        'model' => $model,
        'studies' => $studies,
        'works' => $works,
    ]) ?>

</div>
