<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\Companies;
use common\models\CountView;
use common\models\Orders;
use common\models\OrderUser;
use common\models\StatisticView;
use common\models\SummView;
use common\models\UserAuctions;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * DocumentController implements the CRUD actions for Document model.
 */
class StatisticsController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Document models.
     * @return mixed
     */
    public function actionIndex()
    {

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
           select companies.title_ru, count(auctions.company_id), auctions.company_id from auctions join companies on auctions.company_id = companies.id  
           where auctions.status=10 group by auctions.company_id;");
        $auctions = $command->queryAll();

        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);



        $companies = Companies::find()->all();
        $count = Auctions::find()->where(['>', 'end_date', $t])->count();
        $active_auction = Auctions::find()->where(['<', 'end_date', $t])->count();
        $wait_auction = Auctions::find()->where(['>', 'end_date', $t])->count();
        $counts = Auctions::find()->count();
        $summ_auctions = self::getSumm();
        $summ_orders = self::getSummOrder();
        $count_order = Orders::find()->where(['>', 'end_date', $t])->count();
        $counts_order = Orders::find()->count();
//        VarDumper::dump(self::getSummOrder(), 12, true);
//        die();
        $statistic = self::getStatistic();
        $orders = self::getOrderStatistic();
        $yearstatistic = self::getYearStatistic();
        $yearorderstatistic = self::getYearOrderStatistic();
        return $this->render('index', [
            'auctions' => $auctions,
            'count_order' => $count_order,
            'counts_order' => $counts_order,
            'count' => $count,
            'counts' => $counts,
            'companies' => $companies,
            'statistic' => $statistic,
            'orders' => $orders,
            'summ_auctions' => $summ_auctions,
            'summ_orders' => $summ_orders,
            'active_auction' => $active_auction,
            'wait_auction' => $wait_auction,
            'yearstatistic' => $yearstatistic,
            'yearorderstatistic' => $yearorderstatistic,
        ]);
    }


    public function getStatistic()
    {
        $auctions = Auctions::find()->all();
        $tender = Orders::find()->all();
        $query = Auctions::find()
            ->select('MONTH(start_date) as date, auctions.*');

        $statistic = ArrayHelper::index($auctions, 'start_date');
        $statisticItem = [];
        $finalItem = [];


        foreach ($auctions as $auction) {
            $model = new StatisticView();
            $model->count_auction = $auction->title_ru;
            $model->mounth = date('F', $auction->start_date);
            $model->year = date('Y', $auction->start_date);
            $statisticItem [] = $model;
        }

        $statistic = ArrayHelper::index($statisticItem, null, 'mounth');



        foreach ($statistic as $items) {
            foreach ($items as $item) {
                $model = new StatisticView();
                $model->full_count = count($items);
                $model->year = $item->year;
                $model->month = $item->mounth;

                $finalItem [] = $model;
            }
        }

        $statistic = ArrayHelper::index($finalItem, 'month');



        foreach (Auctions::OYLAR as  $key=>$oylar) {
            $model = new StatisticView();
            foreach ($statistic as $item) {
                    if($item->month == $oylar) {
                        $model->full_count =$item->full_count;
                        $model->year = $item->year;
                        $model->month = $oylar;
                        $model->id = $key;
                        break;
                    }
                    else  {
                    $model->full_count = 0;
                    $model->year = 2021;
                    $model->month =$oylar;
                    $model->id =$key;
                    }
            }
            $finalItem [] = $model;
        }
        $statistic = ArrayHelper::index($finalItem, 'month');
        $id = array_column($statistic, 'id');
       array_multisort($id, SORT_ASC, $statistic);
        return  $statistic;
    }

    public function getOrderStatistic()
    {
        $auctions = Auctions::find()->all();
        $tender = Orders::find()->all();
        $query = Auctions::find()
            ->select('MONTH(start_date) as date, auctions.*');

        $statistic = ArrayHelper::index($auctions, 'start_date');
        $statisticItem = [];
        $finalItem = [];

        foreach ($tender as $auction) {
            $model = new StatisticView();
            $model->count_auction = $auction->title_ru;
            $model->mounth = date('F', $auction->start_date);
            $model->year = date('Y', $auction->start_date);
            $statisticItem [] = $model;
        }
        $statistic = ArrayHelper::index($statisticItem, null, 'mounth');


        foreach ($statistic as $items) {
            foreach ($items as $item) {
                $model = new StatisticView();
                $model->full_count = count($items);
                $model->year = $item->year;
                $model->month = $item->mounth;
//            VarDumper::dump(  $item , 12, true);
//             die();
                $finalItem [] = $model;
            }
        }
        $statistic = ArrayHelper::index($finalItem, 'month');



        foreach (Auctions::OYLAR as $key=>$oylar) {
            $model = new StatisticView();
            foreach ($statistic as $item) {
                if($item->month == $oylar) {
                    $model->full_count =$item->full_count;
                    $model->year = $item->year;
                    $model->month = $oylar;
                    $model->id = $key;
                    break;
                }
                else  {
                    $model->full_count = 0;
                    $model->year = 2021;
                    $model->month =$oylar;
                    $model->id = $key;
                }
            }
            $finalItem [] = $model;
        }
        $statistic = ArrayHelper::index($finalItem, 'month');
        $id = array_column($statistic, 'id');
        array_multisort($id, SORT_ASC, $statistic);

        return $statistic;
    }

    public function getCompany()
    {
        $auctions = Auctions::find()->joinWith(['user'])->all();
        $group_auction = ArrayHelper::index($auctions, null, 'company_id');
        $countItem = [];
        foreach ($group_auction as $group) {
            $model = new CountView();
            $model->company = $group->user->title_company;

            $countItem[] = $model;
        }
        return $group_auction;

    }

    public function getYearStatistic()
    {
        $auctions = Auctions::find()->all();
        $tender = Orders::find()->all();
        $query = Auctions::find()
            ->select('MONTH(start_date) as date, auctions.*');

        $statistic = ArrayHelper::index($auctions, 'start_date');
        $statisticItem = [];
        $finalItem = [];

        foreach ($tender as $auction) {
            $model = new StatisticView();
            $model->count_auction = $auction->title_ru;
            $model->mounth = date('F', $auction->start_date);
            $model->year = date('Y', $auction->start_date);
            $statisticItem [] = $model;
        }
        $statistic = ArrayHelper::index($statisticItem, null, 'year');


        foreach ($statistic as $items) {
            foreach ($items as $item) {
                $model = new StatisticView();
                $model->full_count = count($items);
                $model->year = $item->year;
                $model->month = $item->mounth;
//            VarDumper::dump(  $item , 12, true);
//             die();
                $finalItem [] = $model;
            }
        }
        $statistic = ArrayHelper::index($finalItem, 'year');


        return $statistic;
    }

    public function getYearOrderStatistic()
    {
        $auctions = Auctions::find()->all();
        $tender = Orders::find()->all();
        $query = Auctions::find()
            ->select('MONTH(start_date) as date, auctions.*');

        $statistic = ArrayHelper::index($auctions, 'start_date');
        $statisticItem = [];
        $finalItem = [];

        foreach ($auctions as $auction) {
            $model = new StatisticView();
            $model->count_auction = $auction->title_ru;
            $model->mounth = date('F', $auction->start_date);
            $model->year = date('Y', $auction->start_date);
            $statisticItem [] = $model;
        }
        $statistic = ArrayHelper::index($statisticItem, null, 'year');


        foreach ($statistic as $items) {
            foreach ($items as $item) {
                $model = new StatisticView();
                $model->full_count = count($items);
                $model->year = $item->year;
                $model->month = $item->mounth;
//            VarDumper::dump(  $item , 12, true);
//             die();
                $finalItem [] = $model;
            }
        }
        $statistic = ArrayHelper::index($finalItem, 'year');


        return $statistic;
    }
    public function getSumm()
    {
        $auctions = Auctions::find()->all();
        $tender = Orders::find()->all();
        $query = Auctions::find()
            ->select('MONTH(start_date) as date, auctions.*');
        $user_auctions = UserAuctions::find()->all();
        $user_auctions = ArrayHelper::index($user_auctions,'auction_id');
        $statisticItem = [];
        $s= 0;
        foreach ($user_auctions as $user_auction) {

            $s = $s + $user_auction->price;
        }

        return $s;
    }
    public function getSummOrder()
    {
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);

        $auctions = Auctions::find()->where(['>=','start_date',$t])->all();
        $user_auctions = UserAuctions::find()->joinWith('auction')->andWhere(['>','auction.start_date',$t])->all();

        $user_auctions = ArrayHelper::index($user_auctions,'auction_id');

        $s= 0;
        foreach ($user_auctions as $user_auction) {

            $s = $s + $user_auction->price;
        }

        return $s;
    }
}
