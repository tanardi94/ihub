<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemTransaction;

/**
 * ItemTransactionSearch represents the model behind the search form about `app\models\ItemTransaction`.
 */
class ItemTransactionSearch extends ItemTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trx_no', 'qty', 'status'], 'integer'],
            [['category', 'type', 'item_name', 'request_date', 'pickup_date', 'return_date', 'description', 'pic_request', 'pic_approval'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = ItemTransaction::find();

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
            'trx_no' => $this->trx_no,
            'qty' => $this->qty,
            'request_date' => $this->request_date,
            'pickup_date' => $this->pickup_date,
            'return_date' => $this->return_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pic_request', $this->pic_request])
            ->andFilterWhere(['like', 'pic_approval', $this->pic_approval]);

        return $dataProvider;
    }
}
