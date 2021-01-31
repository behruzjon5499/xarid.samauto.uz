<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $signup_ru
 * @property string|null $signup_uz
 * @property string|null $signup_en
 * @property string|null $support_ru
 * @property string|null $support_uz
 * @property string|null $support_en
 * @property string|null $podacha_ru
 * @property string|null $podacha_uz
 * @property string|null $podacha_en
 * @property string|null $file
 */
class Document extends \yii\db\ActiveRecord
{
    public $file1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'signup_ru', 'signup_uz', 'signup_en', 'support_ru', 'support_uz', 'support_en', 'podacha_ru', 'podacha_uz', 'podacha_en'], 'string'],
            [['file'], 'string', 'max' => 255],
            [['file1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, xls, xlsx, pdf']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_en' => Yii::t('app', 'Title En'),
            'signup_ru' => Yii::t('app', 'Signup Ru'),
            'signup_uz' => Yii::t('app', 'Signup Uz'),
            'signup_en' => Yii::t('app', 'Signup En'),
            'support_ru' => Yii::t('app', 'Support Ru'),
            'support_uz' => Yii::t('app', 'Support Uz'),
            'support_en' => Yii::t('app', 'Support En'),
            'podacha_ru' => Yii::t('app', 'Podacha Ru'),
            'podacha_uz' => Yii::t('app', 'Podacha Uz'),
            'podacha_en' => Yii::t('app', 'Podacha En'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = $this->file1->baseName . '_' . Yii::$app->security->generateRandomString(5) . '.' . $this->file1->extension;

            if ($this->file !== null && !empty($this->file)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/document/' . $this->file);
            }
            $this->file = $name;
            $this->file1->saveAs(Yii::getAlias('@frontend').'/web/uploads/document/' . $name);
            return true;
        } else {
            return false;
        }
    }
}
