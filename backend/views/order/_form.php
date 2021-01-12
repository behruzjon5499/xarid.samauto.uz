<?php

use common\models\Companies;
use kartik\datetime\DateTimePicker;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

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

                            <?= $form->field($model, 'obyom')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'company_id')->dropDownList(
                                \yii\helpers\ArrayHelper::map(
                                    Companies::find()->all(),
                                    'id',
                                    'title_ru'
                                )
                            ) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'start_price')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'razdel')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'next_price')->textInput(['maxlength' => true]) ?>

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

                    <div class="group">
                        <div class="panel box">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                                        Contacts Auctions
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tabLang_111" data-toggle="tab" aria-expanded="true">RU</a></li>
                                            <li class=""><a href="#tabLang_222" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                            <li class=""><a href="#tabLang_333" data-toggle="tab" aria-expanded="true">EN</a></li>
                                        </ul>
                                        <div class="tab-content">

                                            <div class="tab-pane active" id="tabLang_111">

                                                <?= $form->field($model, 'contacts_auction_ru')->textarea(['rows' => 14]) ?>
                                            </div>

                                            <div class="tab-pane " id="tabLang_222">

                                                <?= $form->field($model, 'contacts_auction_uz')->textarea(['rows' => 14]) ?>

                                            </div>

                                            <div class="tab-pane " id="tabLang_333">

                                                <?= $form->field($model, 'contacts_auction_en')->textarea(['rows' => 14]) ?>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" class="collapsed">
                                        Price Auctions
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tabLang_11" data-toggle="tab" aria-expanded="true">RU</a></li>
                                            <li class=""><a href="#tabLang_22" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                            <li class=""><a href="#tabLang_33" data-toggle="tab" aria-expanded="true">EN</a></li>
                                        </ul>
                                        <div class="tab-content">

                                            <div class="tab-pane active" id="tabLang_11">

                                                <?= $form->field($model, 'price_auction_ru')->textarea(['rows' => 14]) ?>

                                            </div>

                                            <div class="tab-pane " id="tabLang_22">

                                                <?= $form->field($model, 'price_auction_uz')->textarea(['rows' => 14]) ?>

                                            </div>

                                            <div class="tab-pane " id="tabLang_33">

                                                <?= $form->field($model, 'price_auction_en')->textarea(['rows' => 14]) ?>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" class="collapsed">
                                            Predmet Auctions
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tabLang_1111" data-toggle="tab" aria-expanded="true">RU</a></li>
                                                <li class=""><a href="#tabLang_2222" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                                <li class=""><a href="#tabLang_3333" data-toggle="tab" aria-expanded="true">EN</a></li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tabLang_1111">

                                                    <?= $form->field($model, 'predmet_auction_ru')->textarea(['rows' => 14]) ?>


                                                </div>

                                                <div class="tab-pane " id="tabLang_2222">

                                                    <?= $form->field($model, 'predmet_auction_uz')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_3333">

                                                    <?= $form->field($model, 'predmet_auction_en')->textarea(['rows' => 14]) ?>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" class="collapsed">
                                            Date Auctions
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tabLang_12" data-toggle="tab" aria-expanded="true">RU</a></li>
                                                <li class=""><a href="#tabLang_21" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                                <li class=""><a href="#tabLang_31" data-toggle="tab" aria-expanded="true">EN</a></li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tabLang_12">

                                                    <?= $form->field($model, 'date_auction_ru')->textarea(['rows' => 14]) ?>


                                                </div>

                                                <div class="tab-pane " id="tabLang_21">

                                                    <?= $form->field($model, 'date_auction_uz')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_31">

                                                    <?= $form->field($model, 'date_auction_en')->textarea(['rows' => 14]) ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" class="collapsed">
                                            Payment Auctions
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tabLang_31" data-toggle="tab" aria-expanded="true">RU</a></li>
                                                <li class=""><a href="#tabLang_32" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                                <li class=""><a href="#tabLang_322" data-toggle="tab" aria-expanded="true">EN</a></li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tabLang_31">

                                                    <?= $form->field($model, 'payment_auction_ru')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_32">

                                                    <?= $form->field($model, 'payment_auction_uz')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_322">

                                                    <?= $form->field($model, 'payment_auction_en')->textarea(['rows' => 14]) ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" class="collapsed">
                                            Payments
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tabLang_41" data-toggle="tab" aria-expanded="true">RU</a></li>
                                                <li class=""><a href="#tabLang_42" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                                <li class=""><a href="#tabLang_43" data-toggle="tab" aria-expanded="true">EN</a></li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tabLang_41">

                                                    <?= $form->field($model, 'payments_ru')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_42">
                                                    <?= $form->field($model, 'payments_ru')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_43">
                                                    <?= $form->field($model, 'payments_ru')->textarea(['rows' => 14]) ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" class="collapsed">
                                            Condititions
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tabLang_15" data-toggle="tab" aria-expanded="true">RU</a></li>
                                                <li class=""><a href="#tabLang_25" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                                <li class=""><a href="#tabLang_35" data-toggle="tab" aria-expanded="true">EN</a></li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tabLang_15">

                                                    <?= $form->field($model, 'conditions_ru')->textarea(['rows' => 14]) ?>


                                                </div>

                                                <div class="tab-pane " id="tabLang_25">
                                                    <?= $form->field($model, 'conditions_uz')->textarea(['rows' => 14]) ?>

                                                </div>

                                                <div class="tab-pane " id="tabLang_35">
                                                    <?= $form->field($model, 'conditions_en')->textarea(['rows' => 14]) ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" class="collapsed">
                                            Subjects
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse9" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tabLang_16" data-toggle="tab" aria-expanded="true">RU</a></li>
                                                <li class=""><a href="#tabLang_26" data-toggle="tab" aria-expanded="true">UZ</a></li>
                                                <li class=""><a href="#tabLang_36" data-toggle="tab" aria-expanded="true">EN</a></li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tabLang_16">
                                                    <?= $form->field($model, 'subjects_ru')->textarea(['rows' => 14]) ?>


                                                </div>

                                                <div class="tab-pane " id="tabLang_26">

                                                    <?= $form->field($model, 'subjects_uz')->textarea(['rows' => 14]) ?>
                                                </div>

                                                <div class="tab-pane " id="tabLang_36">

                                                    <?= $form->field($model, 'subjects_en')->textarea(['rows' => 14]) ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box">
                                <div class="box-header">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" class="collapsed">
                                            Contacts
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse10" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <?= $form->field($model, 'contacts')->textarea(['rows' => 14]) ?>
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
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_title_11" data-toggle="tab" aria-expanded="true">Заголовок прикрепленного файла RU</a></li>
                        <li class=""><a href="#tab_title_12" data-toggle="tab" aria-expanded="false">Заголовок прикрепленного файла UZ</a></li>
                        <li class=""><a href="#tab_title_13" data-toggle="tab" aria-expanded="false">Заголовок прикрепленного файла EN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_title_11">
                            <?= $form->field($model, 'address_ru')->textarea(['rows' => 14]) ?>


                        </div>
                        <div class="tab-pane" id="tab_title_12">
                            <?= $form->field($model, 'address_uz')->textarea(['rows' => 14]) ?>

                        </div>
                        <div class="tab-pane" id="tab_title_13">
                            <?= $form->field($model, 'address_en')->textarea(['rows' => 14]) ?>

                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div>Загрузить файл с характеристиками</div>

                        <button class="btn btn-success img_file">Загрузить файл</button>
                        <div id="image-preview" style="display:none">
                            <?= $form->field($model, 'file1')->fileInput(['class'=> 'file','id'=> 'img_file'])->label( false) ?>
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