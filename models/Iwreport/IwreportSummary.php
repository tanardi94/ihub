<?php 
namespace app\models\Iwreport;

use Yii;
use yii\base\Model;

class IwreportSummary extends Model
{
    public $date_id;
    public $service_category;
    public $iwreport;
    public $iwreports;

    public function rules()
    {
        return [
        	[['date_id','service_category'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'date_id' => 'Tanggal',          
        ];
    }

    public function __construct(){
    	
    }

    public function generateReport(){
        $this->iwreport = Iwreport::find()->where(['date_id'=>$this->date_id])->orderBy(['service_id'=>SORT_ASC]);
        if($this->service_category==1){
            // AOG
            $this->iwreport->andWhere(['in','service_id',[12,17]]);
        } else if($this->service_category==2){
            // PROM
            $this->iwreport->andWhere(['in','service_id',[8]]);
        } else if($this->service_category==3){
            // Satelit
            $this->iwreport->andWhere(['in','service_id',[10]]);
        } else {
            // Umum
            $this->iwreport->andWhere(['in','service_id',[1,2,3,4]]);
        }
        
        $this->iwreports = array();
        
        foreach ($this->iwreport->all() as $idx => $_iwreport) {            
            $this->iwreports[$idx] = $_iwreport;
        }

        if(empty($this->iwreports[0])){
            $this->iwreports[0] = new Iwreport();
        }
        if(empty($this->iwreports[1])){
            $this->iwreports[1] = new Iwreport();
        }
        if(empty($this->iwreports[2])){
            $this->iwreports[2] = new Iwreport();
        }
        if(empty($this->iwreports[3])){
            $this->iwreports[3] = new Iwreport();
        }
    }

    public function getTotalMale(){
    	return $this->iwreport->sum('male');
    }

    public function getTotalFemale(){
    	return $this->iwreport->sum('female');
    }

    public function getTotalUsher(){
    	return $this->iwreport->sum('usher');
    }

    public function getTotalSpro(){
    	return $this->iwreport->sum('spro');
    }

    public function getTotalPaw(){
    	return $this->iwreport->sum('paw');
    }

    public function getTotalMultimedia(){
    	return $this->iwreport->sum('multimedia');
    }

    public function getTotalInterpreter(){
    	return $this->iwreport->sum('interpreter');
    }

    public function getTotalPrayer(){
    	return $this->iwreport->sum('prayer');
    }

    public function getTotalIhub(){
    	return $this->iwreport->sum('ihub');
    }

    public function getTotalPhotography(){
    	return $this->iwreport->sum('photography');
    }

    public function getTotalWelcomer(){
    	return $this->iwreport->sum('welcomer');
    }

    public function getTotalCreamy(){
    	return $this->iwreport->sum('creamy');
    }

    public function getTotalHospitality(){
    	return $this->iwreport->sum('hospitality');
    }

    public function getTotalMstv(){
    	return $this->iwreport->sum('mstv');
    }

    public function getTotalMstv_en(){
        return $this->iwreport->sum('mstv_en');
    }

    public function getTotalMstv_cn(){
        return $this->iwreport->sum('mstv_cn');
    }

    public function getTotalAltarCall1(){
        return $this->iwreport->sum('altarcall');
    }

    public function getTotalAltarCall2(){
        return $this->iwreport->sum('altarcall2');
    }

    public function getTotalBaptismMale(){
        return $this->iwreport->sum('bmale');
    }

    public function getTotalBaptismFemale(){
        return $this->iwreport->sum('bfemale');
    }

    public function getTotalJemaat(){
    	return $this->getTotalMale()+$this->getTotalFemale();
    }

    public function getTotalFemalePercentage(){
        return round(($this->getTotalFemale()/($this->getTotalMale()+$this->getTotalFemale())) * 100) .'%';
    }

    public function getTotalMalePercentage(){
        return round(($this->getTotalMale()/($this->getTotalMale()+$this->getTotalFemale())) * 100) .'%';
    }

    public function getVolunteerRatio(){
        return round($this->getTotalJemaat()/$this->getTotalVolunteer());
    }

    public function getTotalAltarCall(){
        return $this->getTotalAltarCall1()+$this->getTotalAltarCall2();
    }

    public function getTotalBaptism(){
        return $this->getTotalBaptismMale()+$this->getTotalBaptismFemale();
    }

    public function getTotalVolunteer(){
        $totalVolunteer = 0;
        foreach ($this->iwreport->all() as $_iwreport) {
            $totalVolunteer += $_iwreport->getTotalVolunteer();
        }
    	return $totalVolunteer;
    }

    public function getTotalStreaming(){
    	$totalStreaming = 0;
        foreach ($this->iwreport->all() as $_iwreport) {
            $totalStreaming += $_iwreport->getTotalStreaming();
        }
        return $totalStreaming;
    }

    public function getTotalKehadiran(){
    	return $this->getTotalJemaat()+$this->getTotalVolunteer();
    }

    public function getTotal(){
    	return $this->getTotalKehadiran()+$this->getTotalStreaming();
    }
}