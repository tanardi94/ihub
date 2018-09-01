<?php

namespace app\models\IhubIbadah;
use app\models\TblAdditional\TblChurch;

use Yii;

/**
 * This is the model class for table "ihub_ibadah".
 *
 * @property integer $ibadah
 * @property string $namaibadah
 * @property string $awal
 * @property string $selesai
 * @property string $jamawalibadah
 * @property string $jamakhiribadah
 * @property string $batasjampulang
 * @property string $batasjamterlambat
 * @property string $keterangan
 * @property integer $weekly
 * @property string $creation_date
 * @property integer $created_by
 * @property string $last_update_date
 * @property integer $last_updated_by
 * @property integer $status
 * @property integer $IdGereja
 *
 * @property IhubAbsence[] $ihubAbsences
 * @property TblChurch $idGereja
 * @property TblSchedule[] $tblSchedules
 */
class IhubIbadah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ihub_ibadah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ibadah'], 'required'],
            [['ibadah', 'weekly', 'created_by', 'last_updated_by', 'status', 'IdGereja'], 'integer'],
            [['awal', 'selesai', 'jamawalibadah', 'jamakhiribadah', 'batasjampulang', 'batasjamterlambat', 'creation_date', 'last_update_date'], 'safe'],
            [['namaibadah'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
            [['IdGereja'], 'exist', 'skipOnError' => true, 'targetClass' => TblChurch::className(), 'targetAttribute' => ['IdGereja' => 'IdGeraja']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ibadah' => 'Ibadah',
            'namaibadah' => 'Namaibadah',
            'awal' => 'Awal',
            'selesai' => 'Selesai',
            'jamawalibadah' => 'Jamawalibadah',
            'jamakhiribadah' => 'Jamakhiribadah',
            'batasjampulang' => 'Batasjampulang',
            'batasjamterlambat' => 'Batasjamterlambat',
            'keterangan' => 'Keterangan',
            'weekly' => 'Weekly',
            'creation_date' => 'Creation Date',
            'created_by' => 'Created By',
            'last_update_date' => 'Last Update Date',
            'last_updated_by' => 'Last Updated By',
            'status' => 'Status',
            'IdGereja' => 'Id Gereja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIhubAbsences()
    {
        return $this->hasMany(IhubAbsence::className(), ['ibadah' => 'ibadah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGereja()
    {
        return $this->hasOne(TblChurch::className(), ['IdGeraja' => 'IdGereja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSchedules()
    {
        return $this->hasMany(TblSchedule::className(), ['ibadah' => 'ibadah']);
    }
}
