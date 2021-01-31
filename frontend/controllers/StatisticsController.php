<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\Companies;
use common\models\Orders;
use Yii;
use yii\filters\VerbFilter;
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

//        $statistic = Orders::find()->where(['between' , ])
        $companies = Companies::find()->all();
        $count = Auctions::find()->where(['status' => 10])->count();
        $counts = Auctions::find()->count();
        $count_order = Orders::find()->where(['status' => 10])->count();
        $counts_order = Orders::find()->count();

        return $this->render('index', [
            'auctions' => $auctions,
            'count_order' => $count_order,
            'counts_order' => $counts_order,
            'count' => $count,
            'counts' => $counts,
            'companies' => $companies
        ]);
    }

}
