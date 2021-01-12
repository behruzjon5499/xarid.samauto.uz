<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `common\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'company_id', 'status'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'razdel', 'file', 'address', 'start_price', 'end_date', 'description_ru', 'description_uz', 'description_en', 'predmet_order_ru', 'predmet_order_uz', 'predmet_order_en', 'delivery_order_ru', 'delivery_order_uz', 'delivery_order_en', 'payment_order_ru', 'payment_order_uz', 'payment_order_en', 'contacts_order_ru', 'contacts_order_uz', 'contacts_order_en', 'inn', 'mfo', 'account_number', 'bank'], 'safe'],
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
        $query = Orders::find();

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
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'razdel', $this->razdel])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'predmet_order_ru', $this->predmet_order_ru])
            ->andFilterWhere(['like', 'predmet_order_uz', $this->predmet_order_uz])
            ->andFilterWhere(['like', 'predmet_order_en', $this->predmet_order_en])
            ->andFilterWhere(['like', 'delivery_order_ru', $this->delivery_order_ru])
            ->andFilterWhere(['like', 'delivery_order_uz', $this->delivery_order_uz])
            ->andFilterWhere(['like', 'delivery_order_en', $this->delivery_order_en])
            ->andFilterWhere(['like', 'payment_order_ru', $this->payment_order_ru])
            ->andFilterWhere(['like', 'payment_order_uz', $this->payment_order_uz])
            ->andFilterWhere(['like', 'payment_order_en', $this->payment_order_en])
            ->andFilterWhere(['like', 'contacts_order_ru', $this->contacts_order_ru])
            ->andFilterWhere(['like', 'contacts_order_uz', $this->contacts_order_uz])
            ->andFilterWhere(['like', 'contacts_order_en', $this->contacts_order_en])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'mfo', $this->mfo])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'bank', $this->bank]);

        return $dataProvider;
    }
}
