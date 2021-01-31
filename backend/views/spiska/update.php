<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Spiska */

$this->title = 'Обновить данные сотрудника ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Список сотрудников', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spiska-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
