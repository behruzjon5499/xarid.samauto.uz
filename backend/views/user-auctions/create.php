<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserAuctions */

$this->title = Yii::t('app', 'Create User Auctions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Auctions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-auctions-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
