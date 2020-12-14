<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Auctions;

/**
 * AuctionsSearch represents the model behind the search form of `common\models\Auctions`.
 */
class AuctionsSearch extends Auctions
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'start_date', 'end_date'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'file', 'obyom', 'address_ru', 'address_uz', 'address_en', 'start_price', 'next_price', 'description_ru', 'description_uz', 'description_en', 'contacts_auction_ru', 'contacts_auction_uz', 'contacts_auction_en', 'price_auction_ru', 'price_auction_uz', 'price_auction_en', 'predmet_auction_ru', 'predmet_auction_uz', 'predmet_auction_en', 'date_auction_ru', 'date_auction_uz', 'date_auction_en', 'payment_auction_ru', 'payment_auction_uz', 'payment_auction_en', 'payments_ru', 'payments_uz', 'payments_en', 'conditions_ru', 'conditions_uz', 'conditions_en', 'subjects_ru', 'subjects_uz', 'subjects_en', 'contacts', 'status'], 'safe'],
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
        $query = Auctions::find();

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
            'company_id' => $this->company_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'obyom', $this->obyom])
            ->andFilterWhere(['like', 'address_ru', $this->address_ru])
            ->andFilterWhere(['like', 'address_uz', $this->address_uz])
            ->andFilterWhere(['like', 'address_en', $this->address_en])
            ->andFilterWhere(['like', 'start_price', $this->start_price])
            ->andFilterWhere(['like', 'next_price', $this->next_price])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'contacts_auction_ru', $this->contacts_auction_ru])
            ->andFilterWhere(['like', 'contacts_auction_uz', $this->contacts_auction_uz])
            ->andFilterWhere(['like', 'contacts_auction_en', $this->contacts_auction_en])
            ->andFilterWhere(['like', 'price_auction_ru', $this->price_auction_ru])
            ->andFilterWhere(['like', 'price_auction_uz', $this->price_auction_uz])
            ->andFilterWhere(['like', 'price_auction_en', $this->price_auction_en])
            ->andFilterWhere(['like', 'predmet_auction_ru', $this->predmet_auction_ru])
            ->andFilterWhere(['like', 'predmet_auction_uz', $this->predmet_auction_uz])
            ->andFilterWhere(['like', 'predmet_auction_en', $this->predmet_auction_en])
            ->andFilterWhere(['like', 'date_auction_ru', $this->date_auction_ru])
            ->andFilterWhere(['like', 'date_auction_uz', $this->date_auction_uz])
            ->andFilterWhere(['like', 'date_auction_en', $this->date_auction_en])
            ->andFilterWhere(['like', 'payment_auction_ru', $this->payment_auction_ru])
            ->andFilterWhere(['like', 'payment_auction_uz', $this->payment_auction_uz])
            ->andFilterWhere(['like', 'payment_auction_en', $this->payment_auction_en])
            ->andFilterWhere(['like', 'payments_ru', $this->payments_ru])
            ->andFilterWhere(['like', 'payments_uz', $this->payments_uz])
            ->andFilterWhere(['like', 'payments_en', $this->payments_en])
            ->andFilterWhere(['like', 'conditions_ru', $this->conditions_ru])
            ->andFilterWhere(['like', 'conditions_uz', $this->conditions_uz])
            ->andFilterWhere(['like', 'conditions_en', $this->conditions_en])
            ->andFilterWhere(['like', 'subjects_ru', $this->subjects_ru])
            ->andFilterWhere(['like', 'subjects_uz', $this->subjects_uz])
            ->andFilterWhere(['like', 'subjects_en', $this->subjects_en])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
