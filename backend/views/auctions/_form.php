<?php

use common\models\Companies;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

\backend\assets\AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\Auctions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auctions-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Общие</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Параметры</a></li>
                <?php //<li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Видео</a></li> ?>
                <?php /*
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                </li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                */ ?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_title_1" data-toggle="tab" aria-expanded="true">Название RU</a></li>
                                <li class=""><a href="#tab_title_2" data-toggle="tab" aria-expanded="false">Название UZ</a></li>
                                <li class=""><a href="#tab_title_3" data-toggle="tab" aria-expanded="false">Название EN</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_title_1">
                                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label(false) ?>
                                </div>
                                <div class="tab-pane" id="tab_title_2">
                                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label(false) ?>
                                </div>
                                <div class="tab-pane" id="tab_title_3">
                                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="clearfix"></span>
                    <div class="row">
                        <div class="col-md-6">
<div class="row">
    <div class="col-md-9">  <?= $form->field($model, 'obyom')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-3">  <?= $form->field($model, "size_obyom")
            ->dropDownList([
                "1" => "штук",
                "2" => "тонна",
                "3" => "кг",
            ],
                $param = ['options' => [$model->isNewRecord ? 1 : $model->size_obyom => ['Selected' => true]]]
            );
        ?>

    </div>
</div>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'company_id')->dropDownList(
                                \yii\helpers\ArrayHelper::map(
                                    Companies::find()->all(),
                                    'id',
                                    'title_ru'
                                )
                            ) ?>
                            <?= $form->field($model, 'start_price')->textInput(['maxlength' => true]) ?>

                            <?php
                            $model->start_date = date('d.m.Y H:i', $model->isNewRecord ? time() : $model->start_date);
                            echo '<label class="control-label">Start date</label>' . DateTimePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'start_date',
                                    'name' => 'start_date',
                                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                                    'value' => date('d.m.Y H:i'),
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'd.m.yyyy hh:ii'
                                    ]
                                ]);
                            ?>
                            <?php
                            $model->end_date = date('d.m.Y H:i', $model->isNewRecord ? time() : $model->end_date);
                            echo '<label class="control-label">End date</label>' . DateTimePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'end_date',
                                    'name' => 'end_date',
                                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                                    'value' => date('d.m.Y H:i'),
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'd.m.yyyy hh:ii'
                                    ]
                                ]);
                            ?>


                        </div>

                    </div>

                </div>



                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">

                    <div class="panel box">
                        <div class="box-header">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" class="collapsed">
                                    Description Auctions
                                </a>
                            </h4>
                        </div>
                        <div id="collapse" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tabLang_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                                        <li class=""><a href="#tabLang_2" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                        <li class=""><a href="#tabLang_3" data-toggle="tab" aria-expanded="true">EN</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tabLang_1">

                                            <?= $form->field($model, 'description_ru')->textarea(['rows' => 14]) ?>


                                        </div>

                                        <div class="tab-pane " id="tabLang_2">

                                            <?= $form->field($model, 'description_uz')->textarea(['rows' => 14]) ?>
                                        </div>

                                        <div class="tab-pane " id="tabLang_3">

                                            <?= $form->field($model, 'description_en')->textarea(['rows' => 14]) ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- nav-tabs-custom -->
        </div>

        <div class="">

            <div class="col-md-12">
                <div class="col-md-6">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">

                        <div class="col-md-6 form-group">
<!--                            <div>Загрузить файл с характеристиками</div>-->

<!--                            <button class="btn btn-success img_file">Загрузить файл</button>-->
                            <div id="image-preview">
                                <?= $form->field($model, 'file1')->fileInput(['class'=> 'file','id'=> 'img_file']) ?>
                            </div>

                            <?php if( $model->file != '' ){ ?>

                                <img width="150px" src="/uploads/file.png">
                                <button class="btn btn-danger remove-file" data-id="<?=$model->id ?>">Удалить файл</button>

                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                        <?if(!$model->isNewRecord):?>
                            <?= Html::a($model->file, ['/uploads/resume/' . $model->file,], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']) ?>
                        <?endif;?>

                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">

                <?= $form->field($model, 'address')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


    <?php $script = "$('document').ready(function(){
    var href = '{$_SERVER['REQUEST_URI']}';
    
	$(document).on('change','.image',function(){
	  var input = $(this)[0];
	  var obj = $(this);
	  if ( input.files && input.files[0] ) {
		if ( input.files[0].type.match('image.*') ) {
		  var reader = new FileReader();
		  reader.onload = function(e){ $('img#'+obj.attr('id')).attr('src', e.target.result);}
		  reader.readAsDataURL(input.files[0]);
		} else console.log('is not image mime type');
	  } else console.log('not isset files data or files API not support');  
	});  
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });	
	$('.img_file').click(function(e){ e.preventDefault(); $('#img_file.file').click(); });	
    // удаление из фото галереи
	$('.remove-ajax').click(function(e){
		e.preventDefault();	
		if(!confirm('Подтвердите удаление')) return false;
		var id = $(this).data('id');		
		obj = $(this).parent();
		$.ajax({
			type: 'post',
            url: '/admin/transport/delete-gallery-item',            
            dataType: 'json',
            data: 'id='+id+'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status) obj.remove();
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
	$('.remove-file').click(function(e){
		e.preventDefault();
		if(!confirm('Подтвердите удаление')) return false;
		var id = $(this).data('id');		
		obj = $(this).parent();
		$.ajax({
			type: 'post',
            url: '/admin/transport/delete-file',            
            dataType: 'json',
            data: 'id='+id+'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status) window.location.href = href;                
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
});";

$this->registerJs($script, yii\web\View::POS_END);









