<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderUser */

$this->title = Yii::t('app', 'Create Order User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-user-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
