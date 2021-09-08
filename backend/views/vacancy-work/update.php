<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacancyWork */

$this->title = 'Update Vacancy Work: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacancy-work-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
