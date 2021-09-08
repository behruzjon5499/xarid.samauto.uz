<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacancyStudy */

$this->title = 'Create Vacancy Study';
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-study-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
