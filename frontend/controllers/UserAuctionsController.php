<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\User;
use common\models\UserAuctions;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;

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
        $auction = Auctions::find()->where(['id' => $id])->orderBy(['id'=>SORT_DESC])->limit(1)->one();
        $price = $auction->start_price;
        $next_prices = UserAuctions::find()->where(['auction_id' =>$id])->orderBy(['id' => SORT_DESC])->limit(1)->one();
        if (empty($next_prices)){
          $k =  1;
            $summ = 0;
        }
        else{
            $summ = $next_prices->price;
           $k= $next_prices->percent;
        }
        $user = User::find()->andWhere(['id'=>Yii::$app->user->getId()])->one();
        if($user->status==0){
        Yii::$app->session->setFlash('error', Yii::t('app', 'Foydalanuvchi bloklangan keyinroq urinib ko`ring'));
        return $this->redirect(['auctions/view',
        'id' => $id
         ]);
         }
        if ($auction->end_date > time() || ($next_prices->created_at + 300) > time()) {
            $next_price = $auction->start_price + $auction->start_price * 0.05 * $k;
            if ($model->load(Yii::$app->request->post())) {
                if (($model->price - $summ > 0)) {
                    if (!empty($next_prices->user_id)) {
                        if ($next_prices->user_id == Yii::$app->user->id) {
                            Yii::$app->session->setFlash('success', Yii::t('app', 'Sizdan boshqa qatnashuvchilar hali narx oshirishmadi'));
                            return $this->redirect(['../user-auctions/create', 'id' => $id]);
                        } else {
                            if ($model->price > $price) {
                                $model->user_id = Yii::$app->user->id;
                                $model->auction_id = $id;
                                $model->created_at = time();
                                $k++;
                                $model->percent = $k;
                                $model->save(false);
                            } else {
                                Yii::$app->session->setFlash('error', Yii::t('app', 'Sizning narxingiz kam'));
                                return $this->redirect(['../user-auctions/create',
                                    'id' => $id,
                                    'next_price' => $next_price
                                ]);
                            }
                            Yii::$app->session->setFlash('success', Yii::t('app', 'Your request has been successfully delivered'));
                            return $this->redirect(['../user-auctions/create', 'id' => $id]);
                        }
                    } else {
                        if ($model->price > $price) {
                            $model->user_id = Yii::$app->user->id;
                            $model->auction_id = $id;
                            $model->created_at = time();
                            $k++;
                            $model->percent = $k;
                            $model->save(false);
                        } else {
                            Yii::$app->session->setFlash('error', Yii::t('app', 'Sizning narxingiz kam'));
                            return $this->redirect(['../user-auctions/create',
                                'id' => $id,
                                'next_price' => $next_price
                            ]);
                        }
                        Yii::$app->session->setFlash('success', Yii::t('app', 'Your request has been successfully delivered'));
                        return $this->redirect(['../user-auctions/create', 'id' => $id]);


                    }
                } else {
                    Yii::$app->session->setFlash('error', Yii::t('app', 'Qayta urinib ko`ring'));
                    return $this->redirect(['../user-auctions/create',
                        'id' => $id,
                        'next_price' => $next_price
                    ]);
                }

            }
        }
        else{
            Yii::$app->session->setFlash('error', Yii::t('app', 'Vaqt tugagan'));
            return $this->redirect(['auctions/view',
                'id' => $id
            ]);
        }
        return $this->render('create', [
            'model' => $model,
             'next_price' => $next_price
        ]);
    }
}
