<?php

namespace app\models\DataMembers;

use Yii;

/**
 * This is the model class for table "data_members_family".
 *
 * @property integer $nij
 * @property string $relationship
 * @property integer $no_of_siblings
 * @property string $spouse_fullname
 * @property string $spouse_profession
 * @property string $dom
 * @property integer $no_of_children
 *
 * @property DataMembers[] $dataMembers
 */
class DataMembersFamily extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_members_family';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nij', 'relationship', 'no_of_siblings'], 'required'],
            [['nij', 'no_of_siblings', 'no_of_children'], 'integer'],
            [['dom'], 'safe'],
            [['relationship', 'spouse_fullname', 'spouse_profession'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nij' => 'Nij',
            'relationship' => 'Status',
            'no_of_siblings' => 'Jumlah Saudara Kandung',
            'spouse_fullname' => 'Nama Lengkap Pasangan',
            'spouse_profession' => 'Profesi Pasangan',
            'dom' => 'Tanggal Menikah',
            'no_of_children' => 'Jumlah Anak',
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
