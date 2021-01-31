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
            [['company_id'], 'required'],
            [['user_id', 'company_id', 'status'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'address', 'description_ru', 'description_uz', 'description_en', 'predmet_order_ru', 'predmet_order_uz', 'predmet_order_en', 'delivery_order_ru', 'delivery_order_uz', 'delivery_order_en', 'payment_order_ru', 'payment_order_uz', 'payment_order_en', 'contacts_order_ru', 'contacts_order_uz', 'contacts_order_en'], 'string'],
            [['razdel', 'file', 'start_date', 'end_date'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'], 'string', 'max' => 255],
            [['file1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, xls, xlsx, pdf,jpeg, png, jpg, gif']

        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['start_date'],
                ],
                'value' => function() {
                    return strtotime($this->start_date);
                },

            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['end_date'],
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
            'user_id' => Yii::t('app', 'Добавил'),
            'title_ru' => Yii::t('app', 'Заголовок Ru'),
            'title_uz' => Yii::t('app', 'Заголовок Uz'),
            'title_en' => Yii::t('app', 'Заголовок Eng'),
            'razdel' => Yii::t('app', 'Раздел'),
            'file' => Yii::t('app', 'Файл'),
            'company_id' => Yii::t('app', 'Компания'),
            'address' => Yii::t('app', 'Address'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'description_ru' => Yii::t('app', 'Описание конкурса Ru'),
            'description_uz' => Yii::t('app', 'Описание конкурса Uz'),
            'description_en' => Yii::t('app', 'Описание конкурса En'),
            'predmet_order_ru' => Yii::t('app', ' I. Предмет конкурса Ru'),
            'predmet_order_uz' => Yii::t('app', 'I. Предмет конкурса Uz Uz'),
            'predmet_order_en' => Yii::t('app', 'I. Предмет конкурса Uz Eng'),
            'delivery_order_ru' => Yii::t('app', 'II. Условия поставки Ru'),
            'delivery_order_uz' => Yii::t('app', 'II. Условия поставки Uz'),
            'delivery_order_en' => Yii::t('app', 'II. Условия поставки En'),
            'payment_order_ru' => Yii::t('app', 'III. Условия оплаты  Ru'),
            'payment_order_uz' => Yii::t('app', 'III. Условия оплаты  Uz'),
            'payment_order_en' => Yii::t('app', 'III. Условия оплаты  En'),
            'contacts_order_ru' => Yii::t('app', 'IV. Контакты Ru'),
            'contacts_order_uz' => Yii::t('app', 'IV. Контакты Uz'),
            'contacts_order_en' => Yii::t('app', 'IV. Контакты En'),
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
