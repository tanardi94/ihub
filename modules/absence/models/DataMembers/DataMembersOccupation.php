<?php

namespace app\modules\absence\models\DataMembers;
use Yii;

/**
 * This is the model class for table "data_members_occupation".
 *
 * @property integer $nij
 * @property string $education
 * @property string $education_major
 * @property string $carrer
 * @property string $position
 * @property string $business_fields
 * @property string $skill
 *
 * @property DataMembers[] $dataMembers
 */
class DataMembersOccupation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_members_occupation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nij', 'education', 'education_major', 'carrer', 'position', 'business_fields', 'skill'], 'required'],
            [['nij'], 'integer'],
            [['skill'], 'string'],
            [['education', 'education_major', 'carrer', 'position'], 'string', 'max' => 100],
            [['business_fields'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nij' => 'Nij',
            'education' => 'Pendidikan Terakhir',
            'education_major' => 'Jurusan',
            'carrer' => 'Profesi (Karyawan / Profesional, Wiraswasta, Sosial, Rohaniwan, dll)',
            'position' => 'Posisi',
            'business_fields' => 'Bidang Pekerjaan (Pendidikan, Kesehatan, Industri, Perbankan, dll)',
            'skill' => 'Kemampuan Khusus',
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
