<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site_contacts".
 *
 * @property int $id
 * @property string|null $phone
 * @property string|null $telegram
 * @property string|null $instagram
 * @property string|null $facebook
 * @property string|null $youtube
 * @property string|null $rss
 */
class SiteContacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'telegram', 'instagram', 'facebook', 'youtube', 'rss'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone' => Yii::t('app', 'Phone'),
            'telegram' => Yii::t('app', 'Telegram'),
            'instagram' => Yii::t('app', 'Instagram'),
            'facebook' => Yii::t('app', 'Facebook'),
            'youtube' => Yii::t('app', 'Youtube'),
            'rss' => Yii::t('app', 'Rss'),
        ];
    }
}
