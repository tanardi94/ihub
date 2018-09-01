<?php

namespace app\models\Presensi;

use Yii;

/**
 * This is the model class for table "ihub_absence".
 *
 * @property integer $idOpr
 * @property string $tglabsence
 * @property integer $ibadah
 * @property string $keterangan
 * @property integer $IdGroup
 */
class IhubAbsence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ihub_absence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idOpr', 'tglabsence', 'ibadah'], 'required'],
            [['idOpr', 'ibadah', 'IdGroup'], 'integer'],
            [['tglabsence'], 'safe'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idOpr' => 'Id Opr',
            'tglabsence' => 'Tglabsence',
            'ibadah' => 'Ibadah',
            'keterangan' => 'Keterangan',
            'IdGroup' => 'Id Group',
        ];
    }
}
