<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy_work".
 *
 * @property int $id
 * @property int $vacancy_id
 * @property string $work
 * @property string $start_date
 * @property string $end_date
 */
class VacancyWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'work'], 'required'],
            [['vacancy_id'], 'integer'],
            [['start_date','end_date'], 'safe'],
            [['work'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vacancy_id' => Yii::t('app', 'Vacancy ID'),
            'work' => Yii::t('app', 'Work'),
        ];
    }
}
