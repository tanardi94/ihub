<?php

namespace app\models\TblAdditional;

use Yii;

/**
 * This is the model class for table "tbl_division".
 *
 * @property integer $IdDivisi
 * @property string $KodeDivisi
 * @property string $NamaDivisi
 * @property integer $IdMinistry
 *
 * @property Erform[] $erforms
 */
class TblDivision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_division';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdDivisi'], 'required'],
            [['IdDivisi', 'IdMinistry'], 'integer'],
            [['KodeDivisi'], 'string', 'max' => 100],
            [['NamaDivisi'], 'string', 'max' => 200],
            [['NamaDivisi'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdDivisi' => 'Id Divisi',
            'KodeDivisi' => 'Kode Divisi',
            'NamaDivisi' => 'Nama Divisi',
            'IdMinistry' => 'Id Ministry',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getErforms()
    {
        return $this->hasMany(Erform::className(), ['service_req' => 'NamaDivisi']);
    }
}
