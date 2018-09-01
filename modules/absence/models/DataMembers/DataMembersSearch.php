<?php

namespace app\modules\absence\models\DataMembers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataMembers\DataMembers;
use app\models\DataMembers\DataMembersChurch;
use app\models\DataMembers\DataMembersContacts;
use app\models\DataMembers\DataMembersFamily;
use app\models\DataMembers\DataMembersOccupation;
use app\models\DataMembers\DataMembersMinistry;

/**
 * DataMembersSearch represents the model behind the search form about `app\models\DataMembers`.
 */
class DataMembersSearch extends DataMembers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nij', 'gender'], 'integer'],
            [['fullname', 'nickname', 'dob', 'birthplace', 'cloth_size'], 'safe'],
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
        $query = DataMembers::find()->joinWith(['nij0','nij1','nij2','nij3','nij4']);

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
            'nij' => $this->nij,
            'dob' => $this->dob,
            'gender' => $this->gender,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'birthplace', $this->birthplace])
            ->andFilterWhere(['like', 'cloth_size', $this->cloth_size]);

        return $dataProvider;
    }
}
