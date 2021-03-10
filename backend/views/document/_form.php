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

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">Русский</a>
                </li>
                <li role="presentation" class=""><a href="#uz" aria-controls="uz" role="tab" data-toggle="tab">Узбекский</a>
                </li>
                <li role="presentation" class=""><a href="#en" aria-controls="en" role="tab" data-toggle="tab">Английский</a>
                </li>
            </ul>

            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane active" id="ru">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true])->label('Заголовок Ru') ?>
                    <?= $form->field($model, 'signup_ru')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'ru',
                        ])
                    ])->label('Описание Ru') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="uz">
                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true])->label('Заголовок Uz') ?>
                    <?= $form->field($model, 'signup_uz')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'uz'])
                    ])->label('Описание Uz') ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="en">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true])->label('Заголовок Eng ') ?>
                    <?= $form->field($model, 'signup_en')->widget(CKEditor::class, [
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'language' => 'en'])
                    ])->label('Описание Eng') ?>
                </div>
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
