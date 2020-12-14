<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $phone1
 * @property string $phone2
 * @property string $address_ru
 * @property string $address_uz
 * @property string $address_en
 * @property string $email
 * @property string|null $home_phone
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'phone1', 'phone2', 'address_ru', 'address_uz', 'address_en', 'email'], 'required'],
            [['title_ru', 'title_uz', 'title_en', 'phone1', 'phone2', 'email', 'home_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_en' => Yii::t('app', 'Title En'),
            'phone1' => Yii::t('app', 'Phone1'),
            'phone2' => Yii::t('app', 'Phone2'),
            'address_ru' => Yii::t('app', 'Address Ru'),
            'address_uz' => Yii::t('app', 'Address Uz'),
            'address_en' => Yii::t('app', 'Address En'),
            'email' => Yii::t('app', 'Email'),
            'home_phone' => Yii::t('app', 'Home Phone'),
        ];
    }
}
