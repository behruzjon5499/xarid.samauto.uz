<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\UserAuctions;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class UserAuctionsController extends Controller
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


    public function actionCreate($id)
    {
        $model = new UserAuctions();
        $auction = Auctions::find()->where(['id' => $id])->one();
        $price = $auction->start_price;

        if ($model->load(Yii::$app->request->post())) {
            if (!empty($_FILES['UserAuctions']['name']['file1'])) {
                if($model->price > $price){
                $model->file = $_POST['UserAuctions']['file1'];
                $model->file = UploadedFile::getInstance($model, 'file1');
                $model->user_id = Yii::$app->user->id;
                $model->auction_id = $id;
                $model->upload();
                $model->save(false);
                }
                else{
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Sizning narxingiz kam'));
                    return $this->redirect(['../user-auctions/create', 'id' => $id]);
                }
            } else {
                $model->auction_id = $id;
                $model->user_id = Yii::$app->user->id;
                $model->save(false);
//                VarDumper::dump($model,12,true);
//                die();
            }
            Yii::$app->session->setFlash('success', Yii::t('app', 'Your request has been successfully delivered'));
            return $this->redirect(['../user-auctions/create', 'id' => $id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }
}
