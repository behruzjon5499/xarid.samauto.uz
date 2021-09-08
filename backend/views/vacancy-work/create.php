<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacancyWork */

$this->title = 'Create Vacancy Work';
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-work-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
