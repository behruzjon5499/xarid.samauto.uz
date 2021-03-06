<?php

namespace backend\controllers;

use backend\services\AuctionService;
use common\models\Auctions;
use common\models\AuctionsSearch;
use common\models\UserAuctions;
use common\models\UserAuctionsSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * AuctionsController implements the CRUD actions for Auctions model.
 */
class AuctionsController extends Controller
{
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;


    private $service;

    public function __construct($id, $module, AuctionService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    /**
     * Lists all Auctions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuctionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Auctions model.
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
     * Creates a new Auctions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Auctions();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!empty($_FILES['Auctions']['name']['file1']) || !empty($_FILES['Auctions']['name']['image'])) {
                $model->file1 = $_POST['Auctions']['file1'];
                $model->image = $_POST['Auctions']['image'];
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->upload();
                $model->user_id = Yii::$app->user->id;
                $model->save(false);

            } else {

                $model->user_id = Yii::$app->user->id;
                $model->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Auctions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!empty($_FILES['Auctions']['name']['file1']) || !empty($_FILES['Auctions']['name']['image'])) {
                $model->file1 = $_POST['Auctions']['file1'];
                $model->image = $_POST['Auctions']['image'];
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->upload();
                $model->user_id = Yii::$app->user->id;
                $model->save(false);

            } else {

                $model->user_id = Yii::$app->user->id;
                $model->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Auctions model.
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
     * Finds the Auctions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Auctions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Auctions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionActive($id)
    {
        $auctions = Yii::$app->db->createCommand()
            ->update('auction', ['status' => 10], ['id' => $id])
            ->execute();

        $auctions = Auctions::find()->where(['id' => $id])->one();
//        VarDumper::dump($auctions,12,true);
//        die();
        return $this->render('view', [
            'id' => $id,
            'model' => $auctions,
        ]);
    }

    public function actionWait($id)
    {
        $auctions = Yii::$app->db->createCommand()
            ->update('auctions', ['status' => 0], ['id' => $id])
            ->execute();
        $auctions = Auctions::find()->where(['id' => $id])->one();
        return $this->render('view', [
            'id' => $id,
            'model' => $auctions,
        ]);
    }

    public function actionOld()
    {

        $searchModel = new UserAuctionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $auctions = $this->service->getAuction();
//       VarDumper::dump($auctions,12,true);
//       die();

        return $this->render('old', [
            'auctions' => $auctions,

        ]);
    }
}
