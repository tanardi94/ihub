<?php
namespace app\modules\absence\models\IhubAbsence\IhubAbsence;

use Yii;
use yii\base\Model;

class IhubAbsenceReport extends Model
{
    public $tglabsence;
    public $services;
    public $ihubabsence;
    
    public function rules()
    {
        return [
            [['tglabsence','services'],'safe'],  
        ];
    }
    public function attributeLabels()
    {
        return [
            'tglabsence' => 'Absence Date',
        ]
    }
    
    public function __construct()
    {
        
    }
    
    public function generateReport()
    {
        $this->ihubabsence = IhubAbsence::find()->where(['tglabsence'=>$this->tglabsence])
    }
}
?>
