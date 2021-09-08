<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_auctions".
 *
 * @property int $id
 * @property int $user_id
 * @property string $price
 * @property string $status
 * @property string $percent
 * @property int $auction_id
 * @property int $counts
 * @property int $countss
 * @property int $created_at
 *
 * @property Auctions $auction
 * @property User $fulluser
 */
class UserAuctions extends \yii\db\ActiveRecord
{
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_auctions';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'price', 'auction_id'], 'required'],
            [['user_id', 'auction_id','created_at'], 'integer'],
            [['price', 'status'], 'string', 'max' => 255],
            [['auction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auctions::className(), 'targetAttribute' => ['auction_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Имя пользователя'),
            'price' => Yii::t('app', 'Price'),
            'status' => Yii::t('app', 'Порядковый номер'),
            'percent' => Yii::t('app', 'Порядковый номер'),
            'auction_id' => Yii::t('app', 'Auction ID'),
            'created_at' => Yii::t('app', 'Time'),
        ];
    }


    /**
     * Gets query for [[Auction]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuction()
    {
        return $this->hasOne(Auctions::className(), ['id' => 'auction_id']);
    }
    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFulluser()
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
