<?php

namespace app\models\Iwreport;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Iwreport\Iwreport;

/**
 * IwreportSearch represents the model behind the search form about `app\models\Iwreport`.
 */
class IwreportSearch extends Iwreport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'venue_id', 'speaker_id', 'service_id', 'team', 'male', 'female', 'empty', 'usher', 'spro', 'paw', 'multimedia', 'interpreter', 'prayer', 'ihub', 'photography', 'welcomer', 'creamy', 'hospitality', 'altarcall', 'altarcall2', 'bmale', 'bfemale', 'mstv', 'mstv_en', 'mstv_cn'], 'integer'],
            [['date_id', 'timestamp'], 'safe'],
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
        $query = Iwreport::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['timestamp' => SORT_DESC]]
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
            'venue_id' => $this->venue_id,
            'speaker_id' => $this->speaker_id,
            'service_id' => $this->service_id,
            'date_id' => $this->date_id,
            'team' => $this->team,
            'male' => $this->male,
            'female' => $this->female,
            'empty' => $this->empty,
            'usher' => $this->usher,
            'spro' => $this->spro,
            'paw' => $this->paw,
            'multimedia' => $this->multimedia,
            'interpreter' => $this->interpreter,
            'prayer' => $this->prayer,
            'ihub' => $this->ihub,
            'photography' => $this->photography,
            'welcomer' => $this->welcomer,
            'creamy' => $this->creamy,
            'hospitality' => $this->hospitality,
            'altarcall' => $this->altarcall,
            'altarcall2' => $this->altarcall2,
            'bmale' => $this->bmale,
            'bfemale' => $this->bfemale,
            'mstv' => $this->mstv,
            'mstv_en' => $this->mstv_en,
            'mstv_cn' => $this->mstv_cn,
            'timestamp' => $this->timestamp,
        ]);

        return $dataProvider;
    }
}
