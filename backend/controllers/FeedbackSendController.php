<?php

namespace backend\controllers;

use common\models\Feedback;
use common\models\FeedbackSend;
use common\models\FeedbackSendSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * FeedbackSendController implements the CRUD actions for FeedbackSend model.
 */
class FeedbackSendController extends Controller
{
    /**
     * {@inheritdoc}
     */

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;

    /**
     * Lists all FeedbackSend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeedbackSendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FeedbackSend model.
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
     * Creates a new FeedbackSend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new FeedbackSend();

        if ($model->load(Yii::$app->request->post())) {
            $email = Feedback::find()->where(['id' => $id])->one();
            $model->feedback_id = $id;
            $email->status = self::STATUS_ACTIVE;
            $email->save(false);
            $model->save(false);

            Yii::$app
                ->mailer
                ->compose(['html' => 'feedbacksend/confirm-html', 'text' => 'feedbacksend/confirm-text'],  ['model' => $model])
                ->setFrom('no-reply@samauto.uz')
                ->setTo($email->email)
                ->setSubject('Savolingizga javob')
                ->send();

            Yii::$app->session->setFlash('success', Yii::t('app', 'Your request has been successfully delivered'));

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FeedbackSend model.
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
     * Deletes an existing FeedbackSend model.
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
     * Finds the FeedbackSend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeedbackSend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeedbackSend::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
