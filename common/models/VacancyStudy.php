<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy_study".
 *
 * @property int $id
 * @property int $vacancy_id
 * @property string $university
 * @property int|null $end_year
 * @property int|null $type
 */
class VacancyStudy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy_study';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'university','type'], 'required'],
            [['vacancy_id', 'end_year'], 'integer'],
            [['university'], 'string', 'max' => 255],
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
            'university' => Yii::t('app', 'University'),
            'end_year' => Yii::t('app', 'End Year'),
            'type' => Yii::t('app', 'Type'),
        ];
    }
}
