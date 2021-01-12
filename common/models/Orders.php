<?php

namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $razdel
 * @property string|null $file
 * @property int $company_id
 * @property string|null $address
 * @property string $start_date
 * @property string $end_date
 * @property string|null $description_ru
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $predmet_order_ru
 * @property string|null $predmet_order_uz
 * @property string|null $predmet_order_en
 * @property string|null $delivery_order_ru
 * @property string|null $delivery_order_uz
 * @property string|null $delivery_order_en
 * @property string|null $payment_order_ru
 * @property string|null $payment_order_uz
 * @property string|null $payment_order_en
 * @property string|null $contacts_order_ru
 * @property string|null $contacts_order_uz
 * @property string|null $contacts_order_en
 * @property string|null $inn
 * @property string|null $mfo
 * @property string|null $account_number
 * @property string|null $bank
 * @property int $status
 *
 * @property Companies $company
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    public $file1;
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id', 'start_date', 'end_date'], 'required'],
            [['user_id', 'company_id', 'status'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'address', 'description_ru', 'description_uz', 'description_en', 'predmet_order_ru', 'predmet_order_uz', 'predmet_order_en', 'delivery_order_ru', 'delivery_order_uz', 'delivery_order_en', 'payment_order_ru', 'payment_order_uz', 'payment_order_en', 'contacts_order_ru', 'contacts_order_uz', 'contacts_order_en', 'inn', 'mfo', 'account_number', 'bank'], 'string'],
            [['razdel', 'file', 'start_date', 'end_date'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'], 'string', 'max' => 255],
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
                    return strtotime($this->end_date);
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
            'razdel' => Yii::t('app', 'Razdel'),
            'file' => Yii::t('app', 'File'),
            'company_id' => Yii::t('app', 'Company ID'),
            'address' => Yii::t('app', 'Address'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_en' => Yii::t('app', 'Description En'),
            'predmet_order_ru' => Yii::t('app', 'Predmet Order Ru'),
            'predmet_order_uz' => Yii::t('app', 'Predmet Order Uz'),
            'predmet_order_en' => Yii::t('app', 'Predmet Order En'),
            'delivery_order_ru' => Yii::t('app', 'Delivery Order Ru'),
            'delivery_order_uz' => Yii::t('app', 'Delivery Order Uz'),
            'delivery_order_en' => Yii::t('app', 'Delivery Order En'),
            'payment_order_ru' => Yii::t('app', 'Payment Order Ru'),
            'payment_order_uz' => Yii::t('app', 'Payment Order Uz'),
            'payment_order_en' => Yii::t('app', 'Payment Order En'),
            'contacts_order_ru' => Yii::t('app', 'Contacts Order Ru'),
            'contacts_order_uz' => Yii::t('app', 'Contacts Order Uz'),
            'contacts_order_en' => Yii::t('app', 'Contacts Order En'),
            'price_auction_ru' => Yii::t('app', 'Price Auction Ru'),
            'price_auction_uz' => Yii::t('app', 'Price Auction Uz'),
            'price_auction_en' => Yii::t('app', 'Price Auction En'),
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


    public function upload()
    {
        if ($this->validate()) {
            $name = $this->file1->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file1->extension;

            if ($this->file !== null && !empty($this->file)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/orders/' . $this->file);
            }
            $this->file = $name;
            $this->file1->saveAs(Yii::getAlias('@frontend').'/web/uploads/orders/' . $name);
            return true;
        } else {
            return false;
        }
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
