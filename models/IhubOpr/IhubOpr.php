<?php

namespace app\models\IhubOpr;

use app\models\TblAdditional\TblGroup;
use Yii;

/**
 * This is the model class for table "ihub_opr".
 *
 * @property integer $IdOpr
 * @property string $Kode
 * @property string $Nama
 * @property string $Email
 * @property integer $IdGroup
 * @property integer $SPV
 * @property string $TglLahir
 * @property integer $Posisi
 * @property string $password
 * @property string $comment_ontime
 * @property string $comment_latetime
 * @property string $creation_date
 * @property integer $created_by
 * @property string $last_update_date
 * @property integer $last_updated_by
 * @property integer $status
 *
 * @property IhubAbsence[] $ihubAbsences
 * @property TblGroup $idGroup
 */
class IhubOpr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ihub_opr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdOpr'], 'required'],
            [['IdOpr', 'IdGroup', 'SPV', 'Posisi', 'created_by', 'last_updated_by', 'status'], 'integer'],
            [['TglLahir', 'creation_date', 'last_update_date'], 'safe'],
            [['Kode', 'password'], 'string', 'max' => 50],
            [['Nama'], 'string', 'max' => 100],
            [['Email'], 'string', 'max' => 200],
            [['comment_ontime', 'comment_latetime'], 'string', 'max' => 255],
            [['IdGroup'], 'exist', 'skipOnError' => true, 'targetClass' => TblGroup::className(), 'targetAttribute' => ['IdGroup' => 'IdGroup']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdOpr' => 'Id Opr',
            'Kode' => 'Kode',
            'Nama' => 'Nama',
            'Email' => 'Email',
            'IdGroup' => 'Id Group',
            'SPV' => 'Spv',
            'TglLahir' => 'Tgl Lahir',
            'Posisi' => 'Posisi',
            'password' => 'Password',
            'comment_ontime' => 'Comment Ontime',
            'comment_latetime' => 'Comment Latetime',
            'creation_date' => 'Creation Date',
            'created_by' => 'Created By',
            'last_update_date' => 'Last Update Date',
            'last_updated_by' => 'Last Updated By',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIhubAbsences()
    {
        return $this->hasMany(IhubAbsence::className(), ['idOpr' => 'IdOpr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TblGroup::className(), ['IdGroup' => 'IdGroup']);
    }
}
