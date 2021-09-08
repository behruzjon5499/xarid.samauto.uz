<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
\backend\assets\AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $studies common\models\VacancyStudy */
/* @var $works common\models\VacancyWork */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="vacancy-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <button class="btn btn-danger" id="delete" data-id="<?=$model->id?>" data-url="delete" >DELETE</button>
        <?= Html::a('Resume', ['print', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
<div class="row">
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'full_name',
                'birth_day',
                'nation',

            ],
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'phone',
                'email:email',
                [
                    'attribute' => 'status',
                    'value' => \common\helpers\StatusHelper::statusLabel($model->status),
                    'format' => 'raw',
                ],
            ],
        ]) ?>
    </div>
</div>


    <div class="row">

        <div class="col-md-6">
            <?php if ($studies)
                {?>
                    <h1>Studies</h1>
<table class="table table-info" style="background-color: white;"  border="2" cellpadding="0" cellspacing="0">
  <tbody>
  <?php foreach ($studies as $study){?>
            <tr>
                <td><?=$study->university?></td>
                <td><?=$study->end_year?></td>
                <td><?=$study->type?></td>
            </tr>

            <?php  }?>
            </tbody>
            </table>
              <?php  }?>

        </div>
        <div class="col-md-6">
            <?php if ($works){?>
            <h1>Works</h1>
            <table class="table table-info" style="background-color: white;"  border="2" cellpadding="0" cellspacing="0">
                <tbody>
                <?php foreach ($works as $work){?>
                    <tr>
                        <td><?=$work->work?></td>
                        <td><?=$work->start_date?></td>
                        <td><?=$work->end_date?></td>
                    </tr>

                <?php  }?>
                </tbody>
            </table>
<?php }?>
        </div>
    </div>
</div>


