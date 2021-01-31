<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "spiska".
 *
 * @property int $id
 * @property string|null $nomer
 * @property string|null $table_number
 * @property string|null $full_name
 * @property string|null $inn
 */
class Spiska extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spiska';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer', 'table_number', 'inn'], 'integer'],
            [[ 'full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomer' => ' № п/п',
            'table_number' => 'Табельный номер',
            'full_name' => 'ФИО',
            'inn' => 'ИНН',
        ];
    }
}
