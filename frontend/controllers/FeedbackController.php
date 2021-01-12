<?php

namespace frontend\controllers;

use common\models\Feedback;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * DocumentController implements the CRUD actions for Document model.
 */
class FeedbackController extends Controller
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
     * Lists all Document models.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Feedback();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app
                ->mailer
                ->compose(['html' => 'request/confirm-html', 'text' => 'request/confirm-text'])
                ->setFrom('no-reply@samauto.uz')
                ->setTo($model->email)
                ->setSubject('So`rovingiz muvaffaqiyatli yetkazildi')
                ->send();

            Yii::$app->session->setFlash('success', Yii::t('app', 'Your request has been successfully delivered'));
            return $this->redirect(['../feedback/create', 'id' => $model->id]);
        }
//        VarDumper::dump($model,12,true);
//        die();
        return $this->render('create', [
            'model' => $model
        ]);
    }

}
