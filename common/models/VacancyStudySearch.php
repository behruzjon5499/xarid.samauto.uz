<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VacancyStudy;

/**
 * VacancyStudySearch represents the model behind the search form of `common\models\VacancyStudy`.
 */
class VacancyStudySearch extends VacancyStudy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vacancy_id', 'end_year', 'type'], 'integer'],
            [['university'], 'safe'],
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
        $query = VacancyStudy::find();

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
            'vacancy_id' => $this->vacancy_id,
            'end_year' => $this->end_year,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'university', $this->university]);

        return $dataProvider;
    }
}
