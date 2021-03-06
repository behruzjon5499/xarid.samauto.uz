<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteContacts */

$this->title = Yii::t('app', 'Обновить контактов сайта', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Контакты сайта'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="site-contacts-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
