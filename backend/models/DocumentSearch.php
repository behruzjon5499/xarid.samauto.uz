<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Document;

/**
 * DocumentSearch represents the model behind the search form of `common\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'signup_ru', 'signup_uz', 'signup_en', 'support_ru', 'support_uz', 'support_en', 'podacha_ru', 'podacha_uz', 'podacha_en'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Document::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'signup_ru', $this->signup_ru])
            ->andFilterWhere(['like', 'signup_uz', $this->signup_uz])
            ->andFilterWhere(['like', 'signup_en', $this->signup_en])
            ->andFilterWhere(['like', 'support_ru', $this->support_ru])
            ->andFilterWhere(['like', 'support_uz', $this->support_uz])
            ->andFilterWhere(['like', 'support_en', $this->support_en])
            ->andFilterWhere(['like', 'podacha_ru', $this->podacha_ru])
            ->andFilterWhere(['like', 'podacha_uz', $this->podacha_uz])
            ->andFilterWhere(['like', 'podacha_en', $this->podacha_en]);

        return $dataProvider;
    }
}
