<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabLang_11" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tabLang_21" data-toggle="tab" aria-expanded="true">UZ</a></li>
            <li class=""><a href="#tabLang_31" data-toggle="tab" aria-expanded="true">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabLang_11">

                <?= $form->field($model, 'title_ru')->textarea(['rows' => 14]) ?>


            </div>
            <div class="tab-pane " id="tabLang_21">

                <?= $form->field($model, 'title_uz')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_31">
                <?= $form->field($model, 'title_en')->textarea(['rows' => 14]) ?>

            </div>
        </div>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabLang_12" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tabLang_22" data-toggle="tab" aria-expanded="true">UZ</a></li>
            <li class=""><a href="#tabLang_32" data-toggle="tab" aria-expanded="true">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabLang_12">

                <?= $form->field($model, 'signup_ru')->textarea(['rows' => 14]) ?>


            </div>
            <div class="tab-pane " id="tabLang_22">

                <?= $form->field($model, 'signup_uz')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_32">
                <?= $form->field($model, 'signup_en')->textarea(['rows' => 14]) ?>

            </div>
        </div>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabLang_13" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tabLang_23" data-toggle="tab" aria-expanded="true">UZ</a></li>
            <li class=""><a href="#tabLang_33" data-toggle="tab" aria-expanded="true">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabLang_13">

                <?= $form->field($model, 'support_ru')->textarea(['rows' => 14]) ?>


            </div>
            <div class="tab-pane " id="tabLang_23">

                <?= $form->field($model, 'support_uz')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_33">
                <?= $form->field($model, 'support_en')->textarea(['rows' => 14]) ?>

            </div>
        </div>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabLang_14" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tabLang_24" data-toggle="tab" aria-expanded="true">UZ</a></li>
            <li class=""><a href="#tabLang_34" data-toggle="tab" aria-expanded="true">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabLang_14">

                <?= $form->field($model, 'podacha_ru')->textarea(['rows' => 14]) ?>


            </div>
            <div class="tab-pane " id="tabLang_24">

                <?= $form->field($model, 'podacha_uz')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_34">
                <?= $form->field($model, 'podacha_en')->textarea(['rows' => 14]) ?>

            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-6">
        <div class="col-md-6">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">

                <div class="col-md-6 form-group">
                    <div id="image-preview" >
                        <?= $form->field($model, 'file1')->fileInput(['class'=> 'file','id'=> 'img_file'])->label( false) ?>
                    </div>

                    <?php if( $model->file != '' ){ ?>

                        <img width="150px" src="/uploads/file.png">
                        <button class="btn btn-danger remove-file" data-id="<?=$model->id ?>">Удалить файл</button>

                    <?php } ?>
                </div>
                <div class="clearfix"></div>
                <?if(!$model->isNewRecord):?>
                    <?= Html::a($model->file, ['../../uploads/orders/' . $model->file,], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']) ?>
                <?endif;?>

            </div>

        </div>
    </div>
    <div class="col-md-6"></div>
</div>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $script = "$('document').ready(function(){
    
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
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });});";
$this->registerJs($script, yii\web\View::POS_END);
