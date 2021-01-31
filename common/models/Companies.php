<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property string $mfo
 * @property string $bank
 * @property string $account_number
 * @property string $inn
 *
 * @property Auctions[] $auctions
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'description_ru', 'description_uz', 'description_en','mfo','bank','account_number','inn'], 'required'],
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['title_ru', 'title_uz', 'title_en','mfo','bank','account_number','inn'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', ' Компания  СП ООО "Самаркандский Автомобильный Завод"'),
            'title_uz' => Yii::t('app', 'Заголовок Uz'),
            'title_en' => Yii::t('app', 'Заголовок Eng'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_en' => Yii::t('app', 'Description En'),
            'mfo' => Yii::t('app', 'МФО'),
            'bank' => Yii::t('app', 'Банк'),
            'account_number' => Yii::t('app', 'Расчётный счёт'),
            'inn' => Yii::t('app', 'ИНН'),
        ];
    }

    /**
     * Gets query for [[Auctions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuctions()
    {
        return $this->hasMany(Auctions::className(), ['company_id' => 'id']);
    }
}
