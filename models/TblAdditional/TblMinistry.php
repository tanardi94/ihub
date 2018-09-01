<?php

namespace app\models\TblAdditional;

use Yii;

/**
 * This is the model class for table "tbl_ministry".
 *
 * @property integer $IdMinistry
 * @property string $KodeMinistry
 * @property string $NamaMinistry
 * @property integer $IdDept
 */
class TblMinistry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_ministry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdMinistry'], 'required'],
            [['IdMinistry', 'IdDept'], 'integer'],
            [['KodeMinistry'], 'string', 'max' => 100],
            [['NamaMinistry'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdMinistry' => 'Id Ministry',
            'KodeMinistry' => 'Kode Ministry',
            'NamaMinistry' => 'Nama Ministry',
            'IdDept' => 'Id Dept',
        ];
    }
}
