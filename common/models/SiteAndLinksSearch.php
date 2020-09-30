<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SiteAndLinks;

/**
 * SiteAndLinksSearch represents the model behind the search form of `common\models\SiteAndLinks`.
 */
class SiteAndLinksSearch extends SiteAndLinks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'link_id'], 'integer'],
            [['url'], 'safe'],
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
        $query = SiteAndLinks::find();

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
            'link_id' => $this->link_id,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
