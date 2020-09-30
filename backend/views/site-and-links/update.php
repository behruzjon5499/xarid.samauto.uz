<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteAndLinks */

$this->title = Yii::t('app', 'Update Site And Links: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site And Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="site-and-links-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
