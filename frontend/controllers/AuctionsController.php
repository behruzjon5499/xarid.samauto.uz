<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\UserAuctionFull;
use common\models\UserAuctions;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Yii;
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
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['>=', 'end_date', $t])->andWhere(['status' => 10])->with('userauctions')->all();
        return $this->render('index', [
            'auctions' => $auctions
        ]);
    }

    public function actionView($id)
    {
        $prices = UserAuctions::find()->where(['auction_id' => $id])->orderBy(['id' => SORT_DESC])->limit(1)->one();
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
        $time1 = isset(Yii::$app->request->queryParams['start_time'])
            ? strtotime(Yii::$app->request->queryParams['start_time']) : '';
        $time2 = isset(Yii::$app->request->queryParams['end_time'])
            ? strtotime(Yii::$app->request->queryParams['end_time']) : '';

        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        if($time1 && $time2){
            $auctions = Auctions::find()->where(['<', 'end_date', $t])->andWhere(['between', 'start_date', $time1, $time2])->all();
        }
        else{
            $auctions = Auctions::find()->where(['<', 'end_date', $t])->all();
        }

        $items = [];

        if ($auctions) {

            foreach ($auctions as $auction) {
                $model = new UserAuctionFull();
                $model->id = $auction->id;
                $model->start_date = $auction->start_date;
                $model->title_ru = $auction->title_ru;
                $model->title_uz = $auction->title_uz;
                $model->title_en = $auction->title_en;
                $model->obyom = $auction->obyom;
                $model->address = $auction->address;
                $model->start_price = $auction->start_price;
                $userauctions  = UserAuctions::find()->where(['auction_id'=>$auction->id])->with('fulluser')->orderBy(['id'=>SORT_DESC])->limit(1)->one();

                    $model->price = $userauctions ? $userauctions->price : $auction->start_price;
                    $model->full_name = $userauctions ? $userauctions->fulluser ? $userauctions->fulluser->username :  '' :'';
                    $model->status = $userauctions ? 'продано' : 'не продано';
                    $model->company = $userauctions ? $userauctions->fulluser? $userauctions->fulluser->jis_yur==1 ? $userauctions->fulluser->title_company  :$userauctions->fulluser->username : "" :'';

                $items[] =$model;
            }
        }
        return $this->render('auction', [
            'auctions' => $items
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
        if (!empty($userauctions)) {
            if (Yii::$app->user->id == $userauctions->user_id) {
                return $this->render('win', [
                    'auctions' => $auctions,
                    'userauctions' => $userauctions
                ]);
            }
        }
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
