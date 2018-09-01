<?php

namespace app\models\DataMembers;

use Yii;

/**
 * This is the model class for table "data_members_church".
 *
 * @property integer $nij
 * @property integer $gms_origin
 * @property string $gms_service
 * @property integer $baptism_water
 * @property integer $baptism_holyspirit
 * @property string $cg_code
 * @property string $cg_cgl_fullname
 * @property string $cg_cgl_phone
 * @property string $cg_position
 * @property string $cg_cgl_coach
 *
 * @property DataMembers[] $dataMembers
 */
class DataMembersChurch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_members_church';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nij', 'gms_origin', 'gms_service', 'baptism_water', 'baptism_holyspirit', 'cg_code', 'cg_cgl_fullname', 'cg_cgl_phone', 'cg_position', 'cg_cgl_coach'], 'required'],
            [['nij', 'gms_origin', 'baptism_water', 'baptism_holyspirit'], 'integer'],
            [['gms_service', 'cg_code', 'cg_cgl_fullname', 'cg_cgl_phone', 'cg_position', 'cg_cgl_coach'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nij' => 'Nij',
            'gms_origin' => 'Asal GMS',
            'gms_service' => 'Kebaktian',
            'baptism_water' => 'Baptis Air',
            'baptism_holyspirit' => 'Baptis Roh Kudus',
            'cg_code' => 'Nama CG',
            'cg_cgl_fullname' => 'Nama Lengkap CG Leader/Coach/Team Leader',
            'cg_cgl_phone' => 'Nomor HP CG Leader/Coach/Team Leader',
            'cg_position' => 'Posisi di CG',
            'cg_cgl_coach' => 'Coach',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataMembers()
    {
        return $this->hasMany(DataMembers::className(), ['nij' => 'nij']);
    }
}
