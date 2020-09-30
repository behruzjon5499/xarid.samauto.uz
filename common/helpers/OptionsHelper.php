<?php
namespace common\helpers;

use common\models\Pages;
use Yii;

Class OptionsHelper {


	//
	public static function getRowsCount(){

	    $default_rc = 5;

	    if(!$rc = Yii::$app->session->get('admin_rows_count')){
            Yii::$app->session->set('admin_rows_count',$default_rc);

        }elseif($options=Pages::find()->where(['page'=>'admin-options'])->one()){
            $options = json_decode($options->data,true);
	        $rc = (int)$options['rows_count'];
	        $rc = $rc > 0 ? $rc : $default_rc;
            Yii::$app->session->set('admin_rows_count',$rc);

        }else{
            $rc = $default_rc;
            Yii::$app->session->set('admin_rows_count',$rc);

        }

		return $rc;
	}

}