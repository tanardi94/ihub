<?php

namespace app\models\Erform;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Erform\Erform;

/**
 * ErformSearch represents the model behind the search form about `app\models\Erform`.
 */
class ErformSearch extends Erform
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'etype', 'est_attd', 'e_weekly', 'pic_phone', 'service_req', 'status'], 'integer'],
            [['ename', 'evenue', 'e_startdate', 'e_enddate', 'pic_name', 'pic_email', 'pic_ministry', 'notes', 'timestamp'], 'safe'],
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
        $query = Erform::find();

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
            'etype' => $this->etype,
            'est_attd' => $this->est_attd,
            'e_startdate' => $this->e_startdate,
            'e_enddate' => $this->e_enddate,
            'e_weekly' => $this->e_weekly,
            'pic_phone' => $this->pic_phone,
            'service_req' => $this->service_req,
            'status' => $this->status,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'ename', $this->ename])
            ->andFilterWhere(['like', 'evenue', $this->evenue])
            ->andFilterWhere(['like', 'pic_name', $this->pic_name])
            ->andFilterWhere(['like', 'pic_email', $this->pic_email])
            ->andFilterWhere(['like', 'pic_ministry', $this->pic_ministry])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
