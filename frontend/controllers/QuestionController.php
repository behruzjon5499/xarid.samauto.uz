<?php

namespace frontend\controllers;

use common\models\QuestionAnswer;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class QuestionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $questions = QuestionAnswer::find()->all();

        return $this->render('faq', [
            'questions' => $questions
        ]);
    }


}
