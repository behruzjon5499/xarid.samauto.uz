<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string $title
 * @property string $icon
 *
 * @property SiteAndLinks[] $siteAndLinks
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'icon'], 'required'],
            [['title', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    /**
     * Gets query for [[SiteAndLinks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSiteAndLinks()
    {
        return $this->hasMany(SiteAndLinks::className(), ['link_id' => 'id']);
    }
}
