<?php

namespace frontend\controllers;

use Yii;
use common\models\OrderUser;
use common\models\OrderUserSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OrderUserController implements the CRUD actions for OrderUser model.
 */
class OrderUserController extends Controller
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
     * Displays a single OrderUser model.
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
     * Creates a new OrderUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderUser();

        if ($model->load(Yii::$app->request->post())) {

            $model->file1 = $_POST['OrderUser']['file1'];
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            $model->file2 = $_POST['OrderUser']['file2'];
            $model->file2 = UploadedFile::getInstance($model, 'file2');
            $model->upload();
            $model->user_id = Yii::$app->user->id;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



}
