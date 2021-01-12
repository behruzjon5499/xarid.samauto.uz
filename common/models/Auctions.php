<?php

namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "auctions".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $file
 * @property string|null $obyom
 * @property int $company_id
 * @property string|null $address
 * @property string $start_price
 * @property string $start_date
 * @property string $end_date
 * @property string|null $description_ru
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $inn
 * @property string|null $mfo
 * @property string|null $account_number
 * @property string|null $bank
 * @property int $status
 *
 * @property Companies $company
 * @property User $user
 */
class Auctions extends \yii\db\ActiveRecord
{
    public $file1;
//    public $date;
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auctions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id', 'start_price'], 'required'],
            [['user_id', 'company_id', 'status'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en'], 'string'],
            [['file', 'obyom', 'address', 'start_price', 'start_date', 'end_date', 'phone', 'email', 'inn', 'mfo', 'account_number', 'bank'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file1'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf']

        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['start_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['start_date'],
                ],
                'value' => function() {
                    return strtotime($this->start_date);
                },

            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['end_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['end_date'],
                ],
                'value' => function() {
                    return strtotime($this->end_date);
                },
            ],
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            $name = $this->file1->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file1->extension;

            if ($this->file !== null && !empty($this->file)) {
                unlink(Yii::getAlias('@backend').'/web/uploads/auctions/' . $this->file);
            }
            $this->file = $name;
            $this->file1->saveAs(Yii::getAlias('@backend').'/web/uploads/auctions/' . $name);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_en' => Yii::t('app', 'Title En'),
            'file' => Yii::t('app', 'File'),
            'obyom' => Yii::t('app', 'Obyom'),
            'company_id' => Yii::t('app', 'Company ID'),
            'address' => Yii::t('app', 'Address'),
            'start_price' => Yii::t('app', 'Start Price'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_en' => Yii::t('app', 'Description En'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'inn' => Yii::t('app', 'Inn'),
            'mfo' => Yii::t('app', 'Mfo'),
            'account_number' => Yii::t('app', 'Account Number'),
            'bank' => Yii::t('app', 'Bank'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}
