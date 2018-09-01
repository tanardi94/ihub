
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IhubAbsence\IhubAbsence;

/**
 * IhubAbsenceSearch represents the model behind the search form about `app\models\IhubAbsence\IhubAbsence`.
 */
class IhubAbsenceSearch extends IhubAbsence
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idOpr', 'ibadah', 'IdGroup'], 'integer'],
            [['tglabsence', 'keterangan'], 'safe'],
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
        $query = IhubAbsence::find();

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
            'idOpr' => $this->idOpr,
            'tglabsence' => $this->tglabsence,
            'ibadah' => $this->ibadah,
            'IdGroup' => $this->IdGroup,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
