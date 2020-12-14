<?php

namespace frontend\controllers;

use common\models\Auctions;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Site controller
 */
class AuctionsController extends Controller
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
        $auctions = Auctions::find()->all();

        return $this->render('index', [
            'auctions' => $auctions
        ]);
    }

    public function actionView($id)
    {
        $auction = Auctions::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'auction' => $auction
        ]);
    }
}
