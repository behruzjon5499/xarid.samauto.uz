<?php

namespace frontend\controllers;

use common\models\Auctions;
use common\models\Contacts;
use common\models\LoginForm;
use common\models\Orders;
use common\models\Spiska;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetForm;
use frontend\models\ResetPasswordForm;
use frontend\models\UpdateForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

//use frontend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $password = '';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $model = new ResetForm();
        $user = User::find()->where(['id' => \Yii::$app->user->getId()])->one();
        $model1 = new UpdateForm();
        $count = Auctions::find()->where(['status' => 10])->count();
        $counts = Auctions::find()->count();
        $count_order = Orders::find()->where(['status' => 10])->count();
        $counts_order = Orders::find()->count();

        if ($model->load(Yii::$app->request->post()) && $model->reset()) {
            $pw = $model->new_password;
            $pwc = $model->new_password;
            if ($pw == $pwc) {

                $user = User::findIdentity(\Yii::$app->user->getId());
                $user->setPassword($pw);
                $user->generateAuthKey();
                $user->password = $pw;
                $user->generateEmailVerificationToken();
                $user->save(false);
                Yii::$app->session->setFlash('success', 'Thank you for reset password');
                return $this->render('index', [
                    'model' => $model,
                    'model1' => $model1
                ]);
            } else {

            }
        } elseif ($model1->load(Yii::$app->request->post())) {
//            VarDumper::dump($model1,12,true);
//            die();
            $user = User::findIdentity(\Yii::$app->user->getId());
            $username = $model1->username;
            $email = $model1->email;
            $phone = $model1->phone;
            $title_company = $model1->title_company;
            $user->username = $username;
            $user->email = $email;
            $user->phone = $phone;
            $user->title_company = $title_company;
            $user->save(false);

        } else {
            return $this->render('index', [
                'count_order' => $count_order,
                'counts_order' => $counts_order,
                'count' => $count,
                'counts' => $counts,
                'model' => $model,
                'model1' => $model1
            ]);
        }


        return $this->render('index', [
            'count_order' => $count_order,
            'counts_order' => $counts_order,
            'count' => $count,
            'counts' => $counts,
            'model' => $model,
            'model1' => $model1
        ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $user = User::findOne(Yii::$app->user->getId());
        if ($user){
            $user->active_user=0;
            $user->save(false);
        }
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $contacts = Contacts::find()->all();

        return $this->render('contacts', [

            'contacts' => $contacts,


        ]);

    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     * @throws \yii\base\Exception
     */

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->jis_yur == 1) {
                $model->file = $_POST['User']['file'];
                $model->file = UploadedFile::getInstance($model, 'file');

                $model->file1 = $_POST['User']['file1'];
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->upload();
                $p = $model->password;
                $model->setPassword($p);
                $model->generateAuthKey();
                $model->generateEmailVerificationToken();
//            VarDumper::dump($model,12,true);
//            die();
                $model->save(false);
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->jis_yur == 2) {
                $model->file2 = $_POST['User']['file2'];
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $spiska = Spiska::find()->Where(['inn' => $model->inn])->andWhere(['table_number' => $model->table_number])->all();
                if (!Empty($spiska)) {
                    $model->upload1();
                    $p = $model->password;
                    $model->setPassword($p);
                    $model->generateAuthKey();
                    $model->generateEmailVerificationToken();
                    $model->title_company = 'СП ООО "Самаркандский Автомобильный Завод"';
//                    VarDumper::dump($model, 12, true);
//                    die();
                    $model->save(false);
                    Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                } else {
                    Yii::$app->session->setFlash('success', 'Tabel nomer yoki inn xato kiritildi');
                    return $this->render('signup', [
                        'model' => $model,
                    ]);
                }
            }
        } else {
            return $this->render('signup', [
                'model' => $model,
            ]);

        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionReset()
    {
        $model = new ResetForm();
        $model1 = new UpdateForm();
        $user = User::find()->where(['id' => \Yii::$app->user->getId()])->one();
        if ($model->load(Yii::$app->request->post()) && $model->reset()) {
            $pw = $model->new_password;
            $pwc = $model->new_password;
            if ($pw == $pwc) {
                $user = User::findIdentity(\Yii::$app->user->getId());
                $user->setPassword($pw);
                $user->generateAuthKey();
                $user->password = $pw;
                $user->generateEmailVerificationToken();
                $user->save(false);
                Yii::$app->session->setFlash('success', 'Thank you for reset password');
                return $this->render('index', [
                    'model' => $model,
                    'model1' => $model1
                ]);

            } else {
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                return $this->render('index', [
                    'model' => $model,
                    'model1' => $model1
                ]);
            }


        } else {
//            Yii::$app->session->setFlash('success', 'Thank you ');
//            return $this->render('index', [
//                'model' => $model,
//                'model1' => $model1
//            ]);
        }
        return $this->render('index', [
            'model' => $model,
            'model1' => $model1
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            VarDumper::dump($model,12,true);
//            die();
            if ($model->sendEmail()) {
//                VarDumper::dump($model,12,true);
//                die();
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.,,opolllllllll
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionLang($lang = 'ru')
    {
        $ref = Yii::$app->request->referrer;
        $_lang = ['ru', 'uz', 'en']; // допустимые языки
        if (!in_array($lang, $_lang)) $lang = 'ru';
        Yii::$app->session->set('lang', $lang);

        Yii::$app->language = $lang; // установка языка на сайте

        return $this->redirect($ref);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
