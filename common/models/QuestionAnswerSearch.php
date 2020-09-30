<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\QuestionAnswer;

/**
 * QuestionAnswerSearch represents the model behind the search form of `common\models\QuestionAnswer`.
 */
class QuestionAnswerSearch extends QuestionAnswer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['question_ru', 'question_uz', 'question_en', 'answer_ru', 'answer_uz', 'answer_en'], 'safe'],
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
        $query = QuestionAnswer::find();

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

        $query->andFilterWhere(['like', 'question_ru', $this->question_ru])
            ->andFilterWhere(['like', 'question_uz', $this->question_uz])
            ->andFilterWhere(['like', 'question_en', $this->question_en])
            ->andFilterWhere(['like', 'answer_ru', $this->answer_ru])
            ->andFilterWhere(['like', 'answer_uz', $this->answer_uz])
            ->andFilterWhere(['like', 'answer_en', $this->answer_en]);

        return $dataProvider;
    }
}
