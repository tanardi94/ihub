<?php

namespace app\models\IhubAbsence;
use app\models\IhubIbadah\IhubIbadah;
use app\models\IhubOpr\IhubOpr;
use app\models\TblAdditional\TblGroup;
use app\models\DataMembers\DataMembers;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "ihub_absence".
 *
 * @property integer $idOpr
 * @property string $tglabsence
 * @property integer $ibadah
 * @property string $keterangan
 * @property string $creation_date
 * @property integer $created_by
 * @property string $last_update_date
 * @property integer $last_updated_by
 * @property integer $status
 * @property integer $IdGroup
 * @property string $waktumasuk
 * @property string $waktukeluar
 *
 * @property IhubIbadah $ibadah0
 * @property IhubOpr $idOpr0
 * @property TblGroup $idGroup
 */
class IhubAbsence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ihub_absence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idOpr', 'tglabsence', 'ibadah'], 'required'],
            [['idOpr', 'ibadah', 'created_by', 'last_updated_by', 'status', 'IdGroup'], 'integer'],
            [['tglabsence', 'creation_date', 'last_update_date', 'waktumasuk', 'waktukeluar'], 'safe'],
            [['keterangan','status_ontime'], 'string', 'max' => 255],
            [['ibadah'], 'exist', 'skipOnError' => true, 'targetClass' => IhubIbadah::className(), 'targetAttribute' => ['ibadah' => 'ibadah']],
            [['idOpr'], 'exist', 'skipOnError' => true, 'targetClass' => IhubOpr::className(), 'targetAttribute' => ['idOpr' => 'IdOpr']],
            [['IdGroup'], 'exist', 'skipOnError' => true, 'targetClass' => TblGroup::className(), 'targetAttribute' => ['IdGroup' => 'IdGroup']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idOpr' => 'Id Operator',
            'tglabsence' => 'Tanggal Absensi',
            'ibadah' => 'Service',
            'keterangan' => 'Keterangan',
            'creation_date' => 'Creation Date',
            'created_by' => 'Created By',
            'last_update_date' => 'Last Update Date',
            'last_updated_by' => 'Last Updated By',
            'status' => 'Status',
            'IdGroup' => 'Id Group',
            'waktumasuk' => 'Check In',
            'waktukeluar' => 'Check Out',
            'status_ontime' => 'Status',
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
    public function getIdOpr0()
    {
        return $this->hasOne(IhubOpr::className(), ['IdOpr' => 'idOpr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TblGroup::className(), ['IdGroup' => 'IdGroup']);
    }
}
