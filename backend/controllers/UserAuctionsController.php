<?php

namespace backend\controllers;

use Yii;
use common\models\UserAuctions;
use common\models\UserAuctionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserAuctionsController implements the CRUD actions for UserAuctions model.
 */
class UserAuctionsController extends Controller
{

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
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
     * Lists all UserAuctions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserAuctionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
            if (!empty($_FILES['UserAuctions']['name']['file1'])) {
                $model->file1 = $_POST['UserAuctions']['file1'];
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
        $feedback = UserAuctions::find()->where(['id'=>$id])->one();
        $feedback->status=self::STATUS_ACTIVE;
        $feedback->save();
        return $this->render('view', [
            'id'=>$id,
            'model' => $feedback,
        ]);
    }
    public function actionWait($id)
    {
        $feedback = UserAuctions::find()->where(['id'=>$id])->one();
        $feedback->status=self::STATUS_WAIT;
        $feedback->save();
        return $this->render('view', [
            'id'=>$id,
            'model' => $feedback,
        ]);
    }

}
