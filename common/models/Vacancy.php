<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $full_name
 * @property string $birth_day
 * @property string|null $nation
 * @property int|null $phone
 * @property string|null $email
 * @property int $status
 */
class Vacancy extends \yii\db\ActiveRecord
{
    public $Study;
    public $Work;
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    const UZBEK = 'uz';
    const RUSSIAN = 'ru';
    const ENGLISH = 'en';
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'birth_day'], 'required'],
            [['birth_day','phone'], 'safe'],
            [['Study','Work'], 'safe'],
            ['email', 'email'],
            [[ 'status'], 'integer'],
            [['status'], 'default', 'value' => 0],
            [['full_name'], 'string', 'max' => 250],
            [['nation'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'birth_day' => Yii::t('app', 'Birth Day'),
            'nation' => Yii::t('app', 'Nation'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
