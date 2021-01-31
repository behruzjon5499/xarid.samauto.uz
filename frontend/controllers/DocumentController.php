<?php

namespace frontend\controllers;

use common\models\Document;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * DocumentController implements the CRUD actions for Document model.
 */
class DocumentController extends Controller
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
    public function actionIndex($id)
    {
        $documents = Document::find()->where(['id' => $id])->one();

        return $this->render('index', [
            'documents' => $documents
        ]);
    }

}
