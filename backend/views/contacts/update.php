<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */

$this->title = Yii::t('app', 'Update Contacts: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contacts-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
