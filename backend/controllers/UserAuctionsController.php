<?php

namespace backend\controllers;

use common\models\Auctions;
use common\models\AuctionsSearch;
use common\models\Send;
use common\models\SiteAndLinks;
use common\models\UserAuctions;
use common\models\UserAuctionsSearch;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserAuctionsController implements the CRUD actions for UserAuctions model.
 */
class UserAuctionsController extends Controller
{

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;


    /**
     * Lists all UserAuctions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $searchModel = new AuctionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id'=>SORT_DESC]);
        return $this->render('auctionsindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexTab($id)
    {
        $searchModel = new UserAuctionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['auction_id' => $id])->orderBy(['price'=>SORT_DESC]);
//        $dataProvider->query->groupby(['auction_id']);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserAuctions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserAuctions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserAuctions();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {

            $model->user_id = Yii::$app->user->id;
            $model->save(false);

            return $this->render('create', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Updates an existing UserAuctions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserAuctions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserAuctions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAuctions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAuctions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionActive($id)
    {
        $feedback = UserAuctions::find()->where(['id' => $id])->one();
        $feedback->status = self::STATUS_ACTIVE;
        $feedback->save();
        return $this->render('view', [
            'id' => $id,
            'model' => $feedback,
        ]);
    }

    public function actionWait($id)
    {
        $feedback = UserAuctions::find()->where(['id' => $id])->one();
        $feedback->status = self::STATUS_WAIT;
        $feedback->save();
        return $this->render('view', [
            'id' => $id,
            'model' => $feedback,
        ]);
    }

    public function actionSend()
    {
        $time = new \DateTime('now');
        $today = $time->format('d-m-Y H:i:s');
        $t = strtotime($today);
        $auctions = Auctions::find()->where(['<', 'end_date', $t])->andWhere(['status' => 10])->all();

        foreach($auctions as $auction):
            $userauctions = UserAuctions::find()->where(['auction_id'=>$auction->id])->one();
//            VarDumper::dump($userauctions->user->email);
//            die();
            Yii::$app
                ->mailer
                ->compose(['html' => 'win/confirm-html', 'text' => 'win/confirm-text'])
                ->setFrom('no-reply@samauto.uz')
                ->setTo($userauctions->user->email)
                ->setSubject('sizning Auksioninggiz  bo`yicha ')
                ->send();
            Yii::$app->session->setFlash('success', 'Ваш запрос успешно отправлен');

            $auctionss = Yii::$app->db->createCommand()
                ->update('auctions', ['status' => 0], ['id' => $auction->id])
                ->execute();
        endforeach;

        $searchModel = new AuctionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('auctionsindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNew()
    {
        if( Yii::$app->queue->delay(1)->push(new Send())){
            echo "ok";
    }
        else{
            echo "error";
        }

    }
}
