<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $full_name
 * @property string $company
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $description
 * @property string $status
 */
class Feedback extends \yii\db\ActiveRecord
{

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'company'], 'required'],
            [['description'], 'string'],
            [['full_name', 'company', 'email', 'phone', 'status'], 'string', 'max' => 255],
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
            'company' => Yii::t('app', 'Company'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function getFeedbackSend()
    {
        return $this->hasMany(FeedbackSend::className(), ['feedback_id' => 'full_name']);
    }
}
