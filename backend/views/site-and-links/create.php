<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteAndLinks */

$this->title = Yii::t('app', 'Create Site And Links');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site And Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-and-links-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
