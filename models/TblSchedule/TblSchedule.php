<?php

namespace app\models\TblSchedule;

use Yii;

use app\models\IhubIbadah\IhubIbadah;
use app\models\TblAdditional\TblGroup;
use app\models\TblAdditional\TblChurch;

/**
 * This is the model class for table "tbl_schedule".
 *
 * @property integer $id
 * @property string $tgl
 * @property integer $ibadah
 * @property integer $IdGroup
 * @property integer $IdGereja
 *
 * @property IhubIbadah $ibadah0
 * @property TblGroup $idGroup
 * @property TblChurch $idGereja
 */
class TblSchedule extends \yii\db\ActiveRecord
{
    public $date_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'ibadah', 'IdGroup', 'IdGereja'], 'required'],
            [['tgl'], 'safe'],
            [['ibadah', 'IdGroup', 'IdGereja'], 'integer'],
            [['ibadah'], 'exist', 'skipOnError' => true, 'targetClass' => IhubIbadah::className(), 'targetAttribute' => ['ibadah' => 'ibadah']],
            [['IdGroup'], 'exist', 'skipOnError' => true, 'targetClass' => TblGroup::className(), 'targetAttribute' => ['IdGroup' => 'IdGroup']],
            [['IdGereja'], 'exist', 'skipOnError' => true, 'targetClass' => TblChurch::className(), 'targetAttribute' => ['IdGereja' => 'IdGeraja']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tanggal',
            'ibadah' => 'Ibadah',
            'IdGroup' => 'Team',
            'IdGereja' => 'GMS',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIbadah0()
    {
        return $this->hasOne(IhubIbadah::className(), ['ibadah' => 'ibadah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TblGroup::className(), ['IdGroup' => 'IdGroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGereja()
    {
        return $this->hasOne(TblChurch::className(), ['IdGeraja' => 'IdGereja']);
    }
}
