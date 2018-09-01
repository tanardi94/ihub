<?php

namespace app\models\Presensi;

use Yii;

/**
 * This is the model class for table "tbl_group".
 *
 * @property integer $IdGroup
 * @property string $KodeGroup
 * @property string $NamaGroup
 * @property integer $IdDivisi
 *
 * @property IhubOpr[] $ihubOprs
 */
class TblGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdGroup'], 'required'],
            [['IdGroup', 'IdDivisi'], 'integer'],
            [['KodeGroup'], 'string', 'max' => 100],
            [['NamaGroup'], 'string', 'max' => 200],
            [['NamaGroup'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdGroup' => 'Id Group',
            'KodeGroup' => 'Kode Group',
            'NamaGroup' => 'Nama Group',
            'IdDivisi' => 'Id Divisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIhubOprs()
    {
        return $this->hasMany(IhubOpr::className(), ['IdGroup' => 'IdGroup']);
    }
}
