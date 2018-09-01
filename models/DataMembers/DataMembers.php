<?php

namespace app\models\DataMembers;

use Yii;

/**
 * This is the model class for table "data_members".
 *
 * @property integer $id
 * @property integer $nij
 * @property string $fullname
 * @property string $nickname
 * @property string $dob
 * @property integer $gender
 * @property string $birthplace
 * @property string $cloth_size
 *
 * @property DataMembersChurch $nij0
 * @property DataMembersContacts $nij1
 * @property DataMembersFamily $nij2
 * @property DataMembersMinistry $nij3
 * @property DataMembersOccupation $nij4
 */
class DataMembers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nij', 'fullname', 'nickname', 'dob', 'gender', 'birthplace', 'cloth_size'], 'required'],
            [['nij', 'gender'], 'integer'],
            [['dob', 'iconnect_filename', 'iconnect_presence'], 'safe'],
            [['fullname', 'nickname', 'birthplace', 'cloth_size'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nij' => 'Nij',
            'fullname' => 'Nama Lengkap',
            'nickname' => 'Nama Panggilan',
            'dob' => 'Tanggal Lahir',
            'gender' => 'Jenis Kelamin',
            'birthplace' => 'Kota Kelahiran',
            'cloth_size' => 'Ukuran Baju',
            'iconnect_presence' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNij0()
    {
        return $this->hasOne(DataMembersChurch::className(), ['nij' => 'nij']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNij1()
    {
        return $this->hasOne(DataMembersContacts::className(), ['nij' => 'nij']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNij2()
    {
        return $this->hasOne(DataMembersFamily::className(), ['nij' => 'nij']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNij3()
    {
        return $this->hasOne(DataMembersMinistry::className(), ['nij' => 'nij']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNij4()
    {
        return $this->hasOne(DataMembersOccupation::className(), ['nij' => 'nij']);
    }
}
