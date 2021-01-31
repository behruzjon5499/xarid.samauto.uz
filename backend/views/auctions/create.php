<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Auctions */

$this->title = Yii::t('app', 'Добавить Аукционы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Аукционы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auctions-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
