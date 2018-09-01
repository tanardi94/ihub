<?php

namespace app\models\Iwreport;

use Yii;

use app\models\TblAdditional\TblChurch;
use app\models\TblAdditional\TblGroup;
use app\models\TblAdditional\TblSpeaker;

use app\models\IhubIbadah\IhubIbadah;


/**
 * This is the model class for table "iwreport".
 *
 * @property integer $id
 * @property integer $venue_id
 * @property integer $speaker_id
 * @property integer $service_id
 * @property string $date_id
 * @property integer $team
 * @property integer $male
 * @property integer $female
 * @property integer $empty
 * @property integer $usher
 * @property integer $spro
 * @property integer $paw
 * @property integer $multimedia
 * @property integer $interpreter
 * @property integer $prayer
 * @property integer $ihub
 * @property integer $photography
 * @property integer $welcomer
 * @property integer $creamy
 * @property integer $hospitality
 * @property integer $altarcall
 * @property integer $altarcall2
 * @property integer $bmale
 * @property integer $bfemale
 * @property integer $mstv
 * @property string $timestamp
 *
 * @property TblGereja $venue
 * @property IhubIbadah $service
 * @property TblGroup $team0
 * @property TblSpeaker $speaker
 */
class Iwreport extends \yii\db\ActiveRecord
{
    public $date_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iwreport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['venue_id', 'speaker_id', 'service_id', 'date_id', 'team', 'male', 'female', 'empty', 'usher', 'spro', 'paw', 'multimedia', 'interpreter', 'prayer', 'ihub', 'photography', 'welcomer', 'creamy', 'hospitality', 'altarcall', 'altarcall2', 'bmale', 'bfemale', 'mstv'], 'required'],
            [['venue_id', 'speaker_id', 'service_id', 'team', 'male', 'female', 'empty', 'usher', 'spro', 'paw', 'multimedia', 'interpreter', 'prayer', 'ihub', 'photography', 'welcomer', 'creamy', 'hospitality', 'altarcall', 'altarcall2', 'bmale', 'bfemale', 'mstv', 'mstv_en', 'mstv_cn'], 'integer'],
            [['date_id', 'timestamp'], 'safe'],
            [['venue_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblChurch::className(), 'targetAttribute' => ['venue_id' => 'IdGeraja']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => IhubIbadah::className(), 'targetAttribute' => ['service_id' => 'ibadah']],
            [['team'], 'exist', 'skipOnError' => true, 'targetClass' => TblGroup::className(), 'targetAttribute' => ['team' => 'IdGroup']],
            [['speaker_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSpeaker::className(), 'targetAttribute' => ['speaker_id' => 'speaker_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'venue_id' => 'Venue',
            'speaker_id' => 'Speaker',
            'service_id' => 'Service',
            'date_id' => 'Date',
            'team' => 'Team',
            'male' => 'Male',
            'female' => 'Female',
            'empty' => 'Empty',
            'usher' => 'Usher',
            'spro' => 'Spro',
            'paw' => 'Paw',
            'multimedia' => 'Multimedia',
            'interpreter' => 'Interpreter',
            'prayer' => 'Prayer',
            'ihub' => 'Ihub',
            'photography' => 'Photography',
            'welcomer' => 'Welcomer',
            'creamy' => 'Creative Ministry',
            'hospitality' => 'Hospitality',
            'altarcall' => 'Altar Call',
            'altarcall2' => 'Altar Call 2',
            'bmale' => 'Baptism Male',
            'bfemale' => 'Baptism Female',
            'mstv' => 'Indonesia',
            'mstv_en' => 'English',
            'mstv_cn' => 'Chinese',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenue()
    {
        return $this->hasOne(TblChurch::className(), ['IdGeraja' => 'venue_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(IhubIbadah::className(), ['ibadah' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam0()
    {
        return $this->hasOne(TblGroup::className(), ['IdGroup' => 'team']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeaker()
    {
        return $this->hasOne(TblSpeaker::className(), ['speaker_id' => 'speaker_id']);
    }

    public function getMalePercentage(){
        if(($this->male+$this->female)!=0){
            return round($this->male/($this->male+$this->female)*100) . '%';
        } else {
            return null;
        }
    }

    public function getFemalePercentage(){
        if(($this->male+$this->female)!=0){
            return round($this->female/($this->male+$this->female)*100) . '%';
        } else {
            return null;
        }
    }

    public function getTotalJemaat(){
        if(($this->male+$this->female)!=0){
            return ($this->male+$this->female);
        } else {
            return null;
        }
    }

    public function getTotalVolunteer(){
        $totalVolunteer = $this->usher+$this->spro+$this->paw+$this->multimedia+$this->interpreter+$this->ihub+$this->prayer;
        if($totalVolunteer!=0){
            return $totalVolunteer;
        } else {
            return null;
        }
    }

    public function getStreamingInPercentage(){
        if(($this->getTotalStreaming())!=0){
            return round($this->mstv/($this->getTotalStreaming())*100) . '%';
        } else {
            return null;
        }
    }

    public function getStreamingEnPercentage(){
        if(($this->getTotalStreaming())!=0){
            return round($this->mstv_en/($this->getTotalStreaming())*100) . '%';
        } else {
            return null;
        }
    }

    public function getStreamingCnPercentage(){
        if(($this->getTotalStreaming())!=0){
            return round($this->mstv_cn/($this->getTotalStreaming())*100) . '%';
        } else {
            return null;
        }
    }

    public function getTotalStreaming(){
        $totalStreaming = $this->mstv+$this->mstv_en+$this->mstv_cn;
        if($totalStreaming!=0){
            return $totalStreaming;
        } else {
            return null;
        }
    }

    public function getTotalKehadiran(){
        $totalKehadiran = $this->getTotalJemaat() + $this->getTotalVolunteer();
        if($totalKehadiran!=0){
            return $totalKehadiran;
        } else {
            return null;
        }
    }

    public function getTotalIbadah(){
        $totalIbadah = $this->getTotalJemaat() + $this->getTotalVolunteer() + $this->getTotalStreaming();
        if($totalIbadah!=0){
            return $totalIbadah;
        }else{
            return null;
        }
    }

    public function getVolunteerRatio(){        
        return '1:'.round($this->getTotalJemaat()/$this->getTotalVolunteer());
    }
    

}
