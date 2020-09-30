<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteLinks */

$this->title = Yii::t('app', 'Create Site Links');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-links-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
