<?php

namespace app\modules\absence\models\IhubAbsence;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\absence\models\IhubAbsence\IhubAbsence;

/**
 * IhubAbsenceSearch represents the model behind the search form about `app\models\IhubAbsence\IhubAbsence`.
 */
class IhubAbsenceSearch extends IhubAbsence
{
    /**
     * @inheritdoc
     */
    public $ibadah0;
    public $idOpr0;
//    public $idGroup;
    public function rules()
    {
        return [
            [['idOpr', 'ibadah', 'created_by', 'last_updated_by', 'status', 'IdGroup'], 'integer'],
            [['tglabsence', 'keterangan', 'creation_date', 'last_update_date', 'waktumasuk', 'waktukeluar','status_ontime'], 'safe'],
            [['ibadah0', 'idOpr0'], 'safe'],
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
        $service_date = Yii::$app->request->get('service_date');
        $query = IhubAbsence::find();
        $query->joinWith(['ibadah0','idOpr0']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        
        $this->load($params);
        
        $dataProvider->sort->attributes['ibadah0'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['ihub_ibadah.namaibadah' => SORT_ASC],
            'desc' => ['ihub_ibadah.namaibadah' => SORT_DESC],
        ];
        // Lets do the same with country now
        $dataProvider->sort->attributes['idOpr0'] = [
            'asc' => ['ihub_opr.Nama' => SORT_ASC],
            'desc' => ['ihub_opr.Nama' => SORT_DESC],
        ];
        $dates = IhubAbsence::find()->where(['IdGroup' => Yii::$app->user->identity->IdGroup])->orderBy('tglabsence DESC')->one();
        $query->andWhere('ihub_absence.IdGroup = '.Yii::$app->user->identity->IdGroup);
        $query->andFilterWhere(['like', 'tglabsence', date("Y-m-d", strtotime($service_date))]);
        
        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        
        
        // grid filtering conditions
        $query->andFilterWhere([
            'idOpr' => $this->idOpr,
            'tglabsence' => $this->tglabsence,
            'ibadah' => $this->ibadah,
            'creation_date' => $this->creation_date,
            'created_by' => $this->created_by,
            'last_update_date' => $this->last_update_date,
            'last_updated_by' => $this->last_updated_by,
            'status' => $this->status,
            'IdGroup' => $this->IdGroup,
            'waktumasuk' => $this->waktumasuk,
            'waktukeluar' => $this->waktukeluar,
            'status_ontime' => $this->status_ontime,
            'ihub_ibadah.namaibadah' => $this->ibadah0,
            'ihub_opr.Nama' => $this->idOpr0,
        ]);
        
        
        return $dataProvider;
    }
}
