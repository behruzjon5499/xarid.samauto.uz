<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Spiska */

$this->title = 'Добавить сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'сотрудника', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spiska-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
