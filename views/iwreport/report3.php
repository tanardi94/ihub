<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchBox;
use dosamigos\datepicker\DateRangePicker;


use app\models\Iwreport\Iwreport;

/* @var $this yii\web\View */
/* @var $model app\models\Erform */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Laporan';
?>
<div class="container iwreport">
<?php if(!Yii::$app->request->post()){ ?>
  <div class="row">
    <?php $form = ActiveForm::begin(); ?>
  <div class="col-lg-4">    
    <?= $form->field($model, 'service_category')->dropDownList(
        [ 
        '0' => 'UMUM',
        '1' => 'AOG',
        '2' => 'PROM',
        '3' => 'SATELIT',
        ])->label(false) ?>
    <?= $form->field($model, 'date_id')->dropDownList(ArrayHelper::map(Iwreport::find()->select(['date_id','DATE_FORMAT(date_id, "%d %b %Y") date_name'])->distinct()->orderBy(['date_id'=>SORT_DESC])->all(),'date_id','date_name'),['prompt'=>'Pilih Tanggal',])->label(false) ?>    
  </div>
  <div class="col-lg-2">
    <div class="form-group">
        <?= Html::submitButton('View Report', ['class'=>'btn btn-success']) ?>
        <?= Html::a('Back',['index'], ['class'=>'btn btn-primary']) ?>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
<?php } ?>
<?php if(isset($model->date_id) && $model->iwreport->count()>0){ ?>

<div class="row table-responsive">
  <div class="col-lg-12">    
  <div class="text-center">
    <h3>ICLICK WEEKLY REPORT</h3>
    <h4>
        <?= $model->iwreports[0]->speaker->speakername ?>
    </h4>
    <h5>
        <?= Yii::$app->formatter->asDate($model->date_id, 'dd MMM yyyy') ?> -
        <?php             
            function weekOfMonth($date) {                                
                //Get the first day of the month.                
                $firstOfMonth = date("Y-m-01", strtotime($date));                
                //Apply above formula.                
                return intval(date("W", strtotime($date))) - intval(date("W", strtotime($firstOfMonth))) + 1;
            }

            //
            $weekNum = weekOfMonth($model->date_id);
            if ($weekNum == 1) {
                echo "Minggu Perpuluhan";
            } elseif ($weekNum == 2) {
                echo "Minggu Perjamuan Kudus";
            } elseif ($weekNum == 3) {
                echo "Minggu Ke Diakonia & Misi";
            } else {
                echo "Minggu Ke ".$weekNum;
            }
        ?>
    </h5>
  </div>
  <table autosize="1">
    <thead>
      <tr>
        <th rowspan="2">Item</th>
        <th colspan="4"><?= (isset($model->iwreports[0]->service))?$model->iwreports[0]->service->namaibadah:null ?></th>
        <th colspan="4"><?= (isset($model->iwreports[1]->service))?$model->iwreports[1]->service->namaibadah:null ?></th>
        <th colspan="4"><?= (isset($model->iwreports[2]->service))?$model->iwreports[2]->service->namaibadah:null ?></th>
        <th colspan="4"><?= (isset($model->iwreports[3]->service))?$model->iwreports[3]->service->namaibadah:null ?></th>
        <th rowspan="2">Grand Total</th>
      </tr>
      <tr>
        <th colspan="2">Jemaat</th>        
        <th>Volunteer</th>
        <th>Streaming</th>
        <th colspan="2">Jemaat</th>        
        <th>Volunteer</th>
        <th>Streaming</th>
        <th colspan="2">Jemaat</th>        
        <th>Volunteer</th>
        <th>Streaming</th>
        <th colspan="2">Jemaat</th>        
        <th>Volunteer</th>
        <th>Streaming</th>
      </tr>      
    </thead>
    <tbody>
      <tr>
        <td colspan="18" class="row-note">Jemaat:</td>
      </tr>
      <tr>
        <td class="col-note">Pria</td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[0]->male ?></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[0]->getMalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[1]->male ?></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[1]->getMalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[2]->male ?></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[2]->getMalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[3]->male ?></td>
        <td class="text-center cell-jemaat-pria"><?= $model->iwreports[3]->getMalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-pria-total"><?= $model->getTotalMale() ?></td>
      </tr>
      <tr>
        <td class="col-note">Wanita</td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[0]->female ?></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[0]->getFemalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[1]->female ?></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[1]->getFemalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[2]->female ?></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[2]->getFemalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[3]->female ?></td>
        <td class="text-center cell-jemaat-wanita"><?= $model->iwreports[3]->getFemalePercentage() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-jemaat-wanita-total"><?= $model->getTotalFemale() ?></td>
      </tr>
      <tr>
        <td colspan="18" class="row-note">Volunteer:</td>
      </tr>
      <tr>
        <td class="col-note">Usher</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->usher ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->usher ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->usher ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->usher ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalUsher() ?></td>
      </tr>
      <tr>
        <td class="col-note">Spro</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->spro ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->spro ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->spro ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->spro ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalSpro() ?></td>
      </tr>
      <tr>
        <td class="col-note">PAW</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->paw ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->paw ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->paw ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->paw ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalPaw() ?></td>
      </tr>
      <tr>
        <td class="col-note">Multimedia</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->multimedia ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->multimedia ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->multimedia ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->multimedia ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalMultimedia() ?></td>
      </tr>
      <tr>
        <td class="col-note">interpreter</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->interpreter ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->interpreter ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->interpreter ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->interpreter ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalInterpreter() ?></td>
      </tr>
      <tr>
        <td class="col-note">IHUB</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->ihub ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->ihub ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->ihub ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->ihub ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalIhub() ?></td>
      </tr>
      <tr>
        <td class="col-note">Prayer</td>
        <td colspan="2"></td>        
        <td class="text-center cell-volunteer"><?= $model->iwreports[0]->prayer ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[1]->prayer ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[2]->prayer ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-volunteer"><?= $model->iwreports[3]->prayer ?></td>
        <td></td>
        <td class="text-center cell-volunteer-total"><?= $model->getTotalPrayer() ?></td>
      </tr>
      <tr>
        <td colspan="18" class="row-note">Streaming:</td>
      </tr>
      <tr>
        <td class="col-note">Indonesia</td>
        <td colspan="2"></td>        
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[0]->mstv ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[1]->mstv ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[2]->mstv ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[3]->mstv ?></td>
        <td class="text-center cell-streaming-total"><?= $model->getTotalMstv() ?></td>
      </tr>
      <tr>
        <td class="col-note">English</td>
        <td colspan="2"></td>        
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[0]->mstv_en ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[1]->mstv_en ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[2]->mstv_en ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[3]->mstv_en ?></td>
        <td class="text-center cell-streaming-total"><?= $model->getTotalMstv_en() ?></td>
      </tr>
      <tr>
        <td class="col-note">Chinese</td>
        <td colspan="2"></td>        
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[0]->mstv_cn ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[1]->mstv_cn ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[2]->mstv_cn ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-streaming"><?= $model->iwreports[3]->mstv_cn ?></td>
        <td class="text-center cell-streaming-total"><?= $model->getTotalMstv_cn() ?></td>
      </tr>
      <tr>
        <td colspan="18" class="row-note-total-per-item">Total per item:</td>
      </tr>
      <tr>
        <td class="col-note">Jemaat</td>
        <td colspan="2" class="text-center cell-per-jemaat"><?= $model->iwreports[0]->getTotalJemaat() ?></td>        
        <td></td>
        <td></td>
        <td colspan="2" class="text-center cell-per-jemaat"><?= $model->iwreports[1]->getTotalJemaat() ?></td>
        <td></td>
        <td></td>
        <td colspan="2" class="text-center cell-per-jemaat"><?= $model->iwreports[2]->getTotalJemaat() ?></td>
        <td></td>
        <td></td>
        <td colspan="2" class="text-center cell-per-jemaat"><?= $model->iwreports[3]->getTotalJemaat() ?></td>
        <td></td>
        <td></td>
        <td class="text-center cell-per-jemaat-total"><?= $model->getTotalJemaat() ?></td>
      </tr>
      <tr>
        <td class="col-note">Volunteer</td>
        <td colspan="2"></td>        
        <td class="text-center cell-per-volunteer"><?= $model->iwreports[0]->getTotalVolunteer() ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-per-volunteer"><?= $model->iwreports[1]->getTotalVolunteer() ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-per-volunteer"><?= $model->iwreports[2]->getTotalVolunteer() ?></td>
        <td></td>
        <td colspan="2"></td>
        <td class="text-center cell-per-volunteer"><?= $model->iwreports[3]->getTotalVolunteer() ?></td>
        <td></td>
        <td class="text-center cell-per-volunteer-total"><?= $model->getTotalVolunteer() ?></td>
      </tr>
      <tr>
        <td class="col-note">Streaming</td>
        <td colspan="2"></td>        
        <td></td>
        <td class="text-center cell-per-streaming"><?= $model->iwreports[0]->getTotalStreaming() ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-per-streaming"><?= $model->iwreports[1]->getTotalStreaming() ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-per-streaming"><?= $model->iwreports[2]->getTotalStreaming() ?></td>
        <td colspan="2"></td>
        <td></td>
        <td class="text-center cell-per-streaming"><?= $model->iwreports[3]->getTotalStreaming() ?></td>
        <td class="text-center cell-per-streaming-total"><?= $model->getTotalStreaming() ?></td>
      </tr>
      <tr class="row-total-kehadiran">
        <td class="col-note col-note-total-kehadiran">Total Kehadiran</td>
        <td colspan="3"><?= $model->iwreports[0]->getTotalKehadiran() ?></td>                
        <td><?= $model->iwreports[0]->getTotalStreaming() ?></td>
        <td colspan="3"><?= $model->iwreports[1]->getTotalKehadiran() ?></td>                
        <td><?= $model->iwreports[1]->getTotalStreaming() ?></td>
        <td colspan="3"><?= $model->iwreports[2]->getTotalKehadiran() ?></td>                
        <td><?= $model->iwreports[2]->getTotalStreaming() ?></td>
        <td colspan="3"><?= $model->iwreports[3]->getTotalKehadiran() ?></td>                
        <td><?= $model->iwreports[3]->getTotalStreaming() ?></td>
        <td><?= $model->getTotalKehadiran() ?></td>
      </tr>
      <tr class="row-grand-total">
        <td class="col-note col-note-grand-total">Grand Total</td>
        <td colspan="4"><?= $model->iwreports[0]->getTotalKehadiran()+$model->iwreports[0]->getTotalStreaming() ?></td>                
        <td colspan="4"><?= $model->iwreports[1]->getTotalKehadiran()+$model->iwreports[1]->getTotalStreaming() ?></td>                
        <td colspan="4"><?= $model->iwreports[2]->getTotalKehadiran()+$model->iwreports[2]->getTotalStreaming() ?></td>                
        <td colspan="4"><?= $model->iwreports[3]->getTotalKehadiran()+$model->iwreports[3]->getTotalStreaming() ?></td>                
        <td><?= $model->getTotal() ?></td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
<?php } ?>