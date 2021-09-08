<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $model_study common\models\VacancyStudy */
/* @var $model_work common\models\VacancyWork */

$this->title = 'Create Vacancy';
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model_study' => $model_study,
        'model_work' => $model_work,
    ]) ?>

</div>
