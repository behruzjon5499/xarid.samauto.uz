<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\Order;
use common\models\Orders;
use common\models\OrderUser;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class OrderController extends Controller
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
        $today = $time->format('Y-m-d');
        $t = strtotime($today);
        $order = Orders::find()->where(['>', 'end_date'  ,$t])->all();
//VarDumper::dump($order,12,true);
//die();
        return $this->render('index', [
            'order' => $order
        ]);
    }

    public function actionView($id)
    {

        $model = new OrderUser();

        if ($model->load(Yii::$app->request->post())) {

            $model->file1 = $_POST['OrderUser']['file1'];
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            $model->file2 = $_POST['OrderUser']['file2'];
            $model->file2 = UploadedFile::getInstance($model, 'file2');
            $model->upload();
            $model->price = $_POST['OrderUser']['price'];
            $model->user_id = Yii::$app->user->id;
            $model->save(false);
//VarDumper::dump($model->user->email);
//die();
            Yii::$app
                ->mailer
                ->compose(['html' => 'order/confirm-html', 'text' => 'order/confirm-text'])
                ->setFrom('no-reply@samauto.uz')
                ->setTo($model->user->email)
                ->setSubject('sizning zakupkangiz bo`yicha ')
                ->send();

            return $this->redirect(['view', 'id' => $model->id]);
        }


        $order = Orders::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'order' => $order,
            'model' => $model,
        ]);
    }
}
