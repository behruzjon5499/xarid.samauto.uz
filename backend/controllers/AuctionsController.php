<?php

namespace backend\controllers;

use common\models\Auctions;
use common\models\AuctionsSearch;
use Yii;
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
            if (!empty($_FILES['Auctions']['name']['file1'])) {
                $model->file1 = $_POST['Auctions']['file1'];
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
            if (!empty($_FILES['Auctions']['name']['file1'])) {
                $model->file1 = $_POST['Auctions']['file1'];
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
        $auctions = Auctions::find()->where(['id' => $id])->one();
        $auctions->status = self::STATUS_ACTIVE;
        $auctions->start_date = $auctions->start_date;
        $auctions->end_date = $auctions->end_date;
//        VarDumper::dump($auctions,12,true);
//        die();
        $auctions->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $auctions,
        ]);
    }

    public function actionWait($id)
    {
        $auctions = Auctions::find()->where(['id' => $id])->one();
        $auctions->status = self::STATUS_WAIT;
        $auctions->start_date = $auctions->start_date;
        $auctions->end_date = $auctions->end_date;
        $auctions->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $auctions,
        ]);
    }
}
