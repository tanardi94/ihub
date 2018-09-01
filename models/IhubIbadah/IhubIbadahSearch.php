<?php

namespace app\models\IhubIbadah;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IhubIbadah\IhubIbadah;

/**
 * IhubIbadahSearch represents the model behind the search form about `app\models\IhubIbadah\IhubIbadah`.
 */
class IhubIbadahSearch extends IhubIbadah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ibadah', 'weekly', 'created_by', 'last_updated_by', 'status', 'IdGereja'], 'integer'],
            [['namaibadah', 'awal', 'selesai', 'jamawalibadah', 'jamakhiribadah', 'batasjampulang', 'batasjamterlambat', 'keterangan', 'creation_date', 'last_update_date'], 'safe'],
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
        $query = IhubIbadah::find();

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
            'ibadah' => $this->ibadah,
            'awal' => $this->awal,
            'selesai' => $this->selesai,
            'jamawalibadah' => $this->jamawalibadah,
            'jamakhiribadah' => $this->jamakhiribadah,
            'batasjampulang' => $this->batasjampulang,
            'batasjamterlambat' => $this->batasjamterlambat,
            'weekly' => $this->weekly,
            'creation_date' => $this->creation_date,
            'created_by' => $this->created_by,
            'last_update_date' => $this->last_update_date,
            'last_updated_by' => $this->last_updated_by,
            'status' => $this->status,
            'IdGereja' => $this->IdGereja,
        ]);

        $query->andFilterWhere(['like', 'namaibadah', $this->namaibadah])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
