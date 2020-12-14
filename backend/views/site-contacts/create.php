<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteContacts */

$this->title = Yii::t('app', 'Create Site Contacts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contacts-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
