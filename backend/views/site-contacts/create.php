<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteContacts */

$this->title = Yii::t('app', 'Добавить контактов сайта');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Контакты сайта'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contacts-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
