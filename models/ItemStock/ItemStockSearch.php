<?php

namespace app\models\ItemStock;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemStock\ItemStock;

/**
 * ItemStockSearch represents the model behind the search form about `app\models\ItemStock`.
 */
class ItemStockSearch extends ItemStock
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qty'], 'integer'],
            [['item_name', 'category', 'description', 'qty_type'], 'safe'],
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
        $query = ItemStock::find();

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
            'qty' => $this->qty,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'qty_type', $this->qty_type]);

        return $dataProvider;
    }
}
