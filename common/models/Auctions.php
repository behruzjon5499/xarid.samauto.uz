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
 * @property string|null $size_obyom
 * @property int $company_id
 * @property string|null $address
 * @property string $start_price
 * @property string $photo
 * @property string $start_date
 * @property string $end_date
 * @property string|null $description_ru
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $phone
 * @property string|null $email
 * @property int $status
 *
 * @property Companies $company
 * @property User $user
 * @property UserAuctions $userauctions
 */
class Auctions extends \yii\db\ActiveRecord
{
    const EVENT_BEFORE_ACTIVE = 'beforeActive';
    public $file1;
    public $date;
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    public $image;
    const OYLAR =  ['January','February','March','April','May','June','July','August','September','October','November','December'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'start_price'], 'required'],
            [['user_id', 'company_id', 'status','size_obyom'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en'], 'string'],
            [['file', 'obyom', 'address', 'start_price', 'start_date', 'end_date', 'phone', 'email'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, xls, xlsx, pdf,jpeg, png, jpg, gif'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, bmp']
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
            if(!empty($this->file1) && !empty($this->image)){
                $name = $this->file1->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file1->extension;
                $name1 = Yii::$app->security->generateRandomString(10) . '.' . $this->image->extension;
                if ($this->file !== null && !empty($this->file)) {
                    unlink(Yii::getAlias('@frontend').'/web/uploads/auctions/' . $this->file);
                }
                if ($this->photo !== null && !empty($this->photo)) {
                    unlink(Yii::getAlias('@frontend').'/web/uploads/auctions/' . $this->photo);
                }
                $this->file = $name;
                $this->file1->saveAs(Yii::getAlias('@frontend').'/web/uploads/auctions/' . $name);
                $this->photo = $name1;
                $this->image->saveAs(Yii::getAlias('@frontend') . '/web/uploads/auctions/' . $name1);
                return true;
            }
            if(!empty($this->file1) || !empty($this->image)){
                if(!empty($this->file1)){
                    $name = $this->file1->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file1->extension;
                    if ($this->file !== null && !empty($this->file)) {
                        unlink(Yii::getAlias('@frontend').'/web/uploads/auctions/' . $this->file);
                    }
                    $this->file = $name;
                    $this->file1->saveAs(Yii::getAlias('@frontend').'/web/uploads/auctions/' . $name);
                    return true;

                }
                if(!empty($this->image)){
                    $name1 = Yii::$app->security->generateRandomString(10) . '.' . $this->image->extension;
                    if ($this->photo !== null && !empty($this->photo)) {
                        unlink(Yii::getAlias('@frontend').'/web/uploads/auctions/' . $this->photo);
                    }
                    $this->photo = $name1;
                    $this->image->saveAs(Yii::getAlias('@frontend') . '/web/uploads/auctions/' . $name1);
                    return true;

                }

            }

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
            'title_ru' => Yii::t('app', 'Заголовок Ru'),
            'title_uz' => Yii::t('app', 'Заголовок Uz'),
            'title_en' => Yii::t('app', 'Заголовок En'),
            'file' => Yii::t('app', 'Файл1'),
            'obyom' => Yii::t('app', 'Объем'),
            'size_obyom' => Yii::t('app', 'Ед. измерения'),
            'company_id' => Yii::t('app', 'Компания  СП ООО "Самаркандский Автомобильный Завод"'),
            'address' => Yii::t('app', 'Адрес'),
            'start_price' => Yii::t('app', 'Начальная цена'),
            'start_date' => Yii::t('app', 'Дата начала'),
            'end_date' => Yii::t('app', 'Дата окончания'),
            'description_ru' => Yii::t('app', 'Данные аукциона Ru'),
            'description_uz' => Yii::t('app', 'Данные аукциона Uz'),
            'description_en' => Yii::t('app', 'Данные аукциона En'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
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
   public function getUserauctions()
{
    return $this->hasMany(UserAuctions::className(), ['auction_id' => 'id']);
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
