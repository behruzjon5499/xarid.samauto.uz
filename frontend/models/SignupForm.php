<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 *  * @property string $again_password
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;
    public $title_company;
    public $email_company;
    public $phone_company;
    public $address_company;
    public $again_password;
    public $inn;
    public $sertifacation;
    public $litsenziya;
    public $check;
    public $status;
    public $zametka;
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 10;
    public $file;
    public $file1;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'phone', 'inn', 'title_company', 'email_company', 'phone_company', 'address_company'], 'required'],
            [['username', 'email', 'phone', 'inn', 'title_company', 'email_company', 'phone_company'], 'string', 'max' => 255],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['check'], 'required'],
            [['check'], 'compare', 'compareValue' => 1, 'message'=>'Please check this'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf','maxSize'=>1024 * 1024 * 5, 'message'=>'Not more than 10MB'],
            [['file1'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf', 'maxSize'=>1024 * 1024 * 5, 'message'=>'Not more than 10MB']
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool
     */


    public function upload()
    {
        if ($this->validate()) {
            $name = $this->file->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file->extension;
            $name1 = $this->file1->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file1->extension;

            if ($this->sertifacation !== null && !empty($this->sertifacation)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/sertification/' . $this->sertifacation);
            }
            if ($this->litsenziya !== null && !empty($this->litsenziya)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/litsenziya/' . $this->litsenziya);
            }
            $this->sertifacation = $name;
            $this->file->saveAs(Yii::getAlias('@frontend').'/web/uploads/sertification/' . $name);

            $this->litsenziya = $name1;
            $this->file1->saveAs(Yii::getAlias('@frontend').'/web/uploads/litsenziya/' . $name1);

            return true;
        } else {
            return false;
        }
    }
    public function signup($model)
    {
//        if ( ! $this->validate() ) {
//
//             print_r($this->getErrors());
//
//            exit;
//
//            return false;
//
//        }

//        $user = new User();
        $model->username = $this->username;
        $user->phone = $this->phone;
        $user->title_company = $this->title_company;
        $user->email_company = $this->email_company;
        $user->address_company = $this->address_company;
        $user->inn = $this->inn;
        $user->check = $this->check;
        $user->phone_company = $this->phone_company;
        $user->email = $this->email;
        $user->upload();
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->password = $this->password;
        $user->generateEmailVerificationToken();

        if(!$user->save()){
            print_r($user->getErrors());
            exit;
            return false;
        }

        return $user;

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }


}
