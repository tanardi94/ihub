<?php

namespace app\models\Erform;

use Yii;
use app\models\TblAdditional\TblDivision;

/**
 * This is the model class for table "erform".
 *
 * @property integer $id
 * @property integer $etype
 * @property string $ename
 * @property string $evenue
 * @property integer $est_attd
 * @property string $e_startdate
 * @property string $e_enddate
 * @property integer $e_weekly
 * @property string $pic_name
 * @property integer $pic_phone
 * @property string $pic_email
 * @property string $pic_ministry
 * @property integer $service_req
 * @property string $notes
 * @property integer $status
 * @property string $timestamp
 *
 * @property TblDivision $serviceReq
 */
class Erform extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'erform';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['etype', 'ename', 'evenue', 'est_attd', 'e_startdate', 'e_enddate', 'e_weekly', 'pic_name', 'pic_phone', 'pic_email', 'pic_ministry', 'service_req', 'notes', 'status'], 'required'],
            [['etype', 'est_attd', 'e_weekly', 'pic_phone', 'status'], 'integer'],
            [['e_startdate', 'e_enddate', 'timestamp'], 'safe'],
            [['service_req','notes'], 'string'],
            [['ename', 'evenue', 'pic_name', 'pic_email', 'pic_ministry'], 'string', 'max' => 255],
            //[['service_req'], 'exist', 'skipOnError' => true, 'targetClass' => TblDivision::className(), 'targetAttribute' => ['service_req' => 'NamaDivisi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etype' => 'Etype',
            'ename' => 'Ename',
            'evenue' => 'Evenue',
            'est_attd' => 'Est Attd',
            'e_startdate' => 'E Startdate',
            'e_enddate' => 'E Enddate',
            'e_weekly' => 'E Weekly',
            'pic_name' => 'Pic Name',
            'pic_phone' => 'Pic Phone',
            'pic_email' => 'Pic Email',
            'pic_ministry' => 'Pic Ministry',
            'service_req' => 'Service Req',
            'notes' => 'Notes',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceReq()
    {
        return $this->hasOne(TblDivision::className(), ['NamaDivisi' => 'service_req']);
    }
}
