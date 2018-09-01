<?php

namespace app\models\Presensi;

use Yii;

/**
 * This is the model class for table "ihub_opr".
 *
 * @property integer $IdOpr
 * @property string $Kode
 * @property string $Nama
 * @property string $Email
 * @property integer $IdGroup
 * @property integer $SPV
 * @property integer $Posisi
 * @property string $password
 * @property string $comment_ontime
 * @property string $comment_latetime
 *
 * @property TblGroup $idGroup
 */
class IhubOpr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ihub_opr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdOpr'], 'required'],
            [['IdOpr', 'IdGroup', 'SPV', 'Posisi'], 'integer'],
            [['Kode', 'password'], 'string', 'max' => 50],
            [['Nama'], 'string', 'max' => 100],
            [['Email'], 'string', 'max' => 200],
            [['comment_ontime', 'comment_latetime'], 'string', 'max' => 255],
            [['IdGroup'], 'exist', 'skipOnError' => true, 'targetClass' => TblGroup::className(), 'targetAttribute' => ['IdGroup' => 'IdGroup']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdOpr' => 'Id Opr',
            'Kode' => 'Kode',
            'Nama' => 'Nama',
            'Email' => 'Email',
            'IdGroup' => 'Id Group',
            'SPV' => 'Spv',
            'Posisi' => 'Posisi',
            'password' => 'Password',
            'comment_ontime' => 'Comment Ontime',
            'comment_latetime' => 'Comment Latetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TblGroup::className(), ['IdGroup' => 'IdGroup']);
    }
}
