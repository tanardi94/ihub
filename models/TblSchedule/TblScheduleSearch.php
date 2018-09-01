<?php

namespace app\models\TblSchedule;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblSchedule\TblSchedule;

/**
 * TblScheduleSearch represents the model behind the search form about `app\models\TblSchedule\TblSchedule`.
 */
class TblScheduleSearch extends TblSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ibadah', 'IdGroup', 'IdGereja'], 'integer'],
            [['tgl'], 'safe'],
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
        $query = TblSchedule::find();

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
            'tgl' => $this->tgl,
            'ibadah' => $this->ibadah,
            'IdGroup' => $this->IdGroup,
            'IdGereja' => $this->IdGereja,
        ]);

        return $dataProvider;
    }
}
