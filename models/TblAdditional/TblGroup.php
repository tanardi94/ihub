<?php

namespace app\models\TblAdditional;

use Yii;

/**
 * This is the model class for table "tbl_group".
 *
 * @property integer $IdGroup
 * @property string $KodeGroup
 * @property string $NamaGroup
 * @property integer $IdDivisi
 *
 * @property Iwreport[] $iwreports
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
    public function getIwreports()
    {
        return $this->hasMany(Iwreport::className(), ['team' => 'IdGroup']);
    }
}
