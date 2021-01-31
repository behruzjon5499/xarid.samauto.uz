<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = Yii::t('app', 'Добавить компанию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
