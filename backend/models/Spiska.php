<?php

namespace app\models;

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
            [['nomer', 'table_number', 'full_name', 'inn'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomer' => 'Nomer',
            'table_number' => 'Table Number',
            'full_name' => 'Full Name',
            'inn' => 'Inn',
        ];
    }
}
