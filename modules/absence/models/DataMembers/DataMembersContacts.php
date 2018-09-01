<?php

namespace app\modules\absence\models\DataMembers;

use Yii;

/**
 * This is the model class for table "data_members_contacts".
 *
 * @property integer $nij
 * @property string $address_1
 * @property string $address_2
 * @property string $phone
 * @property string $email
 * @property string $line
 * @property string $ig
 *
 * @property DataMembers[] $dataMembers
 */
class DataMembersContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_members_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nij', 'address_1', 'address_2', 'phone', 'email', 'line', 'ig'], 'required'],
            [['nij'], 'integer'],
            [['address_1', 'address_2'], 'string', 'max' => 200],
            [['phone', 'email', 'line', 'ig'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nij' => 'Nij',
            'address_1' => 'Alamat 1',
            'address_2' => 'Alamat 2',
            'phone' => 'No HP',
            'email' => 'Email',
            'line' => 'Line',
            'ig' => 'IG',
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
