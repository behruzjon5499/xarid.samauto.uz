<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\UserAuctions;
use Yii;
use yii\filters\VerbFilter;
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
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['>=', 'end_date', $t])->andWhere(['status' => 10])->all();
//        VarDumper::dump($auctions,12,true);
//        die();
        return $this->render('index', [
            'auctions' => $auctions
        ]);
    }

    public function actionView($id)
    {
        $prices = UserAuctions::find()->where(['auction_id' => $id])->orderBy(['id' => SORT_ASC])->limit(1)->one();
        $auction = Auctions::find()->where(['id' => $id])->one();
        $countss = UserAuctions::find()->where(['auction_id' => $id])->groupBy(['user_id', 'id'])->count();
        $counts = UserAuctions::find()->where(['auction_id' => $id])->groupBy(['price', 'id'])->count();

        return $this->render('view', [
            'auction' => $auction,
            'prices' => $prices,
            'countss' => $countss,
            'counts' => $counts,
        ]);
    }

    public function actionAuction()
    {
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['<', 'end_date', $t])->all();
//        VarDumper::dump($auctions,12,true);
//        die();
        return $this->render('auction', [
            'auctions' => $auctions
        ]);
    }

    public function actionWin($id)
    {
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['>', 'end_date', $t])->andwhere(['id' => $id])->one();
//        $id = Yii::$app->user->id;
        $userauctions = UserAuctions::find()->where(['auction_id' => $id])->orderBy(['price' => SORT_DESC])->limit(1)->one();
        if (!empty($userauctions)){
        if (Yii::$app->user->id == $userauctions->user_id  ) {
            return $this->render('win', [
                'auctions' => $auctions,
                'userauctions' => $userauctions
            ]);
        }}
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['>=', 'end_date', $t])->andWhere(['status' => 10])->all();
        return $this->render('auction', [
            'auctions' => $auctions,
            'userauctions' => $userauctions
        ]);
    }
}
