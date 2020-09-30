<?php

/* @var $this yii\web\View */
/* @var $model \backend\models\Links */

$this->title = Yii::t('app', 'Update Links: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="links-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
