<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Auctions */

$this->title = Yii::t('app', 'Create Auctions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auctions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auctions-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
