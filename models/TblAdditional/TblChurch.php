<?php

namespace app\models\TblAdditional;

use Yii;

/**
 * This is the model class for table "tbl_church".
 *
 * @property integer $IdGeraja
 * @property string $NamaGereja
 */
class TblChurch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_church';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdGeraja'], 'required'],
            [['IdGeraja'], 'integer'],
            [['NamaGereja'], 'string', 'max' => 100],
            [['NamaGereja'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdGeraja' => 'Id Geraja',
            'NamaGereja' => 'Nama Gereja',
        ];
    }
}
