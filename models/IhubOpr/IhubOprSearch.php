<?php

namespace app\models\IhubOpr;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IhubOpr\IhubOpr;

/**
 * IhubOprSearch represents the model behind the search form about `app\models\IhubOpr\IhubOpr`.
 */
class IhubOprSearch extends IhubOpr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdOpr', 'IdGroup', 'SPV', 'Posisi', 'created_by', 'last_updated_by', 'status'], 'integer'],
            [['Kode', 'Nama', 'Email', 'TglLahir', 'password', 'comment_ontime', 'comment_latetime', 'creation_date', 'last_update_date'], 'safe'],
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
        $query = IhubOpr::find();

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
            'IdOpr' => $this->IdOpr,
            'IdGroup' => $this->IdGroup,
            'SPV' => $this->SPV,
            'TglLahir' => $this->TglLahir,
            'Posisi' => $this->Posisi,
            'creation_date' => $this->creation_date,
            'created_by' => $this->created_by,
            'last_update_date' => $this->last_update_date,
            'last_updated_by' => $this->last_updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'Kode', $this->Kode])
            ->andFilterWhere(['like', 'Nama', $this->Nama])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'comment_ontime', $this->comment_ontime])
            ->andFilterWhere(['like', 'comment_latetime', $this->comment_latetime]);

        return $dataProvider;
    }
}
