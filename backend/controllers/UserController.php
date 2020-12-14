<?php

namespace backend\controllers;

use common\models\User;
use common\models\UserSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    const ADMIN = 1;
    const MANAGER = 2;
    const USER = 3;
    const GUEST = 0;
    public $password = '';

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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->post('password') == Yii::$app->request->post('again_password')) {
                $model->setPassword($this->password);
                $model->generateAuthKey();
                $model->generateEmailVerificationToken();
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            } else {

            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
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
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionAdmin($id, $role)
    {
        $feedback = User::find()->where(['id' => $id])->one();
        $feedback->role = $role;
        $feedback->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $feedback,
        ]);
    }

    public function actionManager($id, $role)
    {
        $feedback = User::find()->where(['id' => $id])->one();
        $feedback->role = $role;
        $feedback->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $feedback,
        ]);
    }

    public function actionUser($id, $role)
    {
        $feedback = User::find()->where(['id' => $id])->one();
        $feedback->role = $role;
        $feedback->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $feedback,
        ]);
    }
}
