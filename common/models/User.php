<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 *  @property integer $role
 *  @property string $phone
 *  @property string $title_company
 * @property string $email_company
 *  @property integer $address_company
 * @property string $sertifacation
 * @property string $litsenziya
 * @property string $table_number
 * @property string $copy_passport
 * @property string $jis_yur
 * @property string $auth_key
 * @property string $again_password
 * @property integer $status
 *  * @property integer $phone_company
 *  * @property integer $inn
 *  *  * @property integer $check
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ADMIN = 1;
    const MANAGER = 2;
    const USER = 3;
    const GUEST = 0;
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 10;
    const STATUS_ACTIVE = 10;
    public $password = '';
        public $file;
    public $file1;
    public $file2;
    const SCENARIO_SIGNUP2 = 'signup2';
    const SCENARIO_SIGNUP = 'signup';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'phone', 'inn', 'title_company', 'email_company', 'phone_company', 'address_company','jis_yur'], 'required','when' => function($model) {
        return $model->jis_yur == 1;
    }],
            [['username', 'email', 'password', 'phone', 'inn','jis_yur','table_number'], 'required','when' => function($model) {
                return $model->jis_yur == 2;
            }],
            [['username', 'email', 'phone', 'inn', 'title_company', 'email_company', 'phone_company','jis_yur'], 'string', 'max' => 255],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['check'], 'required'],
            [['check'], 'compare', 'compareValue' => 1, 'message'=>'Please check this'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf','maxSize'=>1024 * 1024 * 5, 'message'=>'Not more than 10MB','when' => function($model) {
                return $model->jis_yur == 1;
            }],
            [['file1'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf', 'maxSize'=>1024 * 1024 * 5, 'message'=>'Not more than 10MB','when' => function($model) {
                return $model->jis_yur == 1;
            }],
            [['file2'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf','maxSize'=>1024 * 1024 * 5, 'message'=>'Not more than 10MB','when' => function($model) {
                return $model->jis_yur == 2;
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */


    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE ,'role' => 1]);
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Имя пользователя'),
            'email' => Yii::t('app', 'Электронная почта'),
            'phone' => Yii::t('app', 'Телефон'),
            'title_company' => Yii::t('app', 'Компания'),
            'razdel' => Yii::t('app', 'Razdel'),
            'role' => Yii::t('app', 'Роль'),
            'obyom' => Yii::t('app', 'Obyom'),
            'inn' => Yii::t('app', 'ИНН'),
            'email_company' => Yii::t('app', 'Электронная почта компании'),
            'phone_company' => Yii::t('app', 'Телефон компании'),
            'address_company' => Yii::t('app', 'Адрес компании'),
            'sertifacation' => Yii::t('app', 'Сертификат'),
            'litsenziya' => Yii::t('app', 'Лицензия'),
            'copy_passport' => Yii::t('app', ' Копия паспорта'),
            'company_id' => Yii::t('app', 'Company ID'),
            'address_ru' => Yii::t('app', 'Address Ru'),
            'zametka' => Yii::t('app', 'Заметка'),
            'table_number' => Yii::t('app', 'Табельный номер'),
            'table_number' => Yii::t('app', 'Табельный номер'),
            'address_en' => Yii::t('app', 'Address En'),
            'start_price' => Yii::t('app', 'Start Price'),
            'next_price' => Yii::t('app', 'Next Price'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Добавлено'),
            'updated_at' => Yii::t('app', 'Обновлено'),
            'end_date' => Yii::t('app', 'End Date'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function signup($model)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();
    }


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
    public function upload1()
    {
        if ($this->validate()) {
            $name2 = $this->file2->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file2->extension;
            if ($this->copy_passport !== null && !empty($this->copy_passport)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/passport/' . $this->copy_passport);
            }
            $this->copy_passport = $name2;
            $this->file2->saveAs(Yii::getAlias('@frontend').'/web/uploads/passport/' . $name2);

            return true;
        } else {
            return false;
        }
    }
    public function getRole()
    {
        return User::find()->where(['id'=> \Yii::$app->user->getId()])->one();
    }
    public function isAdmin()
    {
        return $this->role === self::ADMIN;
    }
    public function isManager()
    {
        return $this->role === self::MANAGER;
    }
    public function isUser()
    {
        return $this->role === self::USER;
    }
    public function isGuest()
    {
        return $this->role === self::GUEST;
    }
    public function getUserAuctions()
    {
        return $this->hasMany(UserAuctions::className(), ['user_id' => 'id']);
    }
    public function getOrderUser()
    {
        return $this->hasMany(OrderUser::className(), ['email' => 'id']);
    }
}
