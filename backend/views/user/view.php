<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?php if ($model->isAdmin()):?>
            <?= Html::a(Yii::t('app', 'USER'), ['user', 'id' => $model->id,'role' =>3], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'MANAGER'), ['manager', 'id' => $model->id,'role' =>2], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if($model->isManager()): ?>
            <?= Html::a(Yii::t('app', 'ADMIN'), ['admin', 'id' => $model->id,'role' =>1], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'USER'), ['user', 'id' => $model->id,'role' =>3], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if($model->isUser()): ?>
            <?= Html::a(Yii::t('app', 'ADMIN'), ['admin', 'id' => $model->id,'role' =>1], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'MANAGER'), ['manager', 'id' => $model->id,'role' =>2], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>
<div class="row">
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'email:email',
                'phone',
                'inn',
                'title_company',
                'email_company:email',
                'phone_company',
            ],
        ]) ?>
    </div>

    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'address_company:ntext',
                'sertifacation',
                'litsenziya',
                [
                    'attribute' => 'role',
                    'value' => \common\helpers\UserHelper::statusLabel($model->role),
                    'format' => 'raw',
                ],
                'zametka',
//                'check',
//                'auth_key',
//                'password_hash',
//                'password_reset_token',
                'status',
                'created_at',
                'updated_at',
//                'verification_token',
            ],
        ]) ?>
    </div>
</div>

</div>
