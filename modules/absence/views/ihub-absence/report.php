<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchBox;
use dosamigos\datepicker\DateRangePicker;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use kartik\growl\Growl;
use app\assets\AppAsset;


use app\modules\absence\models\IhubAbsence\IhubAbsence;
use app\modules\absence\models\IhubAbsence\IhubAbsenceSearch;

$this->title = 'Laporan Ringkasan';
/* @var $this yii\web\View */
/* @var $model app\models\Erform */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
a.panel-heading {
    display: block;
}
.panel-primary .panel-heading[aria-expanded="true"], .panel-primary .panel-heading a:hover, .panel-primary .panel-heading a:focus, .panel-primary a.panel-heading:hover, .panel-primary a.panel-heading:focus {
	background-color: #286090;
}
.panel-danger .panel-heading[aria-expanded="true"], .panel-danger .panel-heading a:hover, .panel-danger .panel-heading a:focus, .panel-danger a.panel-heading:hover, .panel-danger a.panel-heading:focus {
	background-color: #c9302c;
}
.panel-default .panel-heading[aria-expanded="true"], .panel-default .panel-heading a:hover, .panel-default .panel-heading a:focus, .panel-default a.panel-heading:hover, .panel-default a.panel-heading:focus {
	background-color: #dcdcdc;
}
.panel-info .panel-heading[aria-expanded="true"], .panel-info .panel-heading a:hover, .panel-info .panel-heading a:focus, .panel-info a.panel-heading:hover, .panel-info a.panel-heading:focus {
	background-color: #31b0d5;
}
.panel-success .panel-heading[aria-expanded="true"], .panel-success .panel-heading a:hover, .panel-success .panel-heading a:focus, .panel-success a.panel-heading:hover, .panel-success a.panel-heading:focus {
	background-color: #449d44;
}
.panel-warning .panel-heading[aria-expanded="true"], .panel-warning .panel-heading a:hover, .panel-warning .panel-heading a:focus, .panel-warning a.panel-heading:hover, .panel-warning a.panel-heading:focus {
	background-color: #ec971f;
}
.panel-group .panel, .panel-group .panel-heading {
	border: none !important;
}
.panel-group .panel-body {
	border: 1px solid #ddd !important;
	border-width: 0 1px 1px 1px !important;
}
.panel-group .panel-heading a, .panel-group a.panel-heading {
	outline: 0;
}
.panel-group .panel-heading a:hover, .panel-group .panel-heading a:focus, .panel-group a.panel-heading:hover, .panel-group a.panel-heading:focus {
	text-decoration: none;
}
.panel-group .panel-heading .icon-indicator {
	margin-right: 10px;
}
.panel-group .panel-heading .icon-indicator:before {
	content: "\e114";
}
.panel-group .panel-heading.collapsed .icon-indicator:before {
	content: "\e080";
}
.card {
	text-align: center;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #555;
}

</style>

<div class="container iwreport">

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

<?php if(isset($model->date_id) && $model->iwreport->count()>0){ ?>
	<div class="row">
		<h5>Iclick Weekly Report | 

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
		    	echo "Minggu Ke ".$weekNum;
		    } elseif ($weekNum == 2) {
		    	echo "Minggu Ke ".$weekNum;
		    } elseif ($weekNum == 3) {
		    	echo "Minggu Ke ".$weekNum;
		    } else {
		    	echo "Minggu Ke ".$weekNum;
		    }
		    ?>


		</h5>
		<h6>Speaker : <?=  $model->iwreport->one()->speaker->speakername ?></h6>        
	</div>

	<div class="row">
		<div class="card mb-3 col-xs-12" style="background-color: #CDDC39">
			<div class="card-body">
				<h1 class="card-text"><?= $model->getTotal() ?></h1>
			</div>
			<div class="card-footer">
				<h4>Total Attendance</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="card mb-3 col-xs-4" style="background-color: #DCE775">
		  <div class="card-body">
		    <h3 class="card-text"><?= $model->getTotalJemaat() ?></h3>
		    <h6 class="card-text">Male <?= $model->getTotalMalePercentage() ?> | Female <?= $model->getTotalFemalePercentage() ?></h6>
		  </div>
		  <div class="card-footer">
		  	<h4 class="small">Congregation</h4>
		  </div>
		</div>
		<div class="card mb-3 col-xs-4" style="background-color: #FFF176">
		  <div class="card-body">
		    <h3 class="card-text"><?= $model->getTotalVolunteer() ?></h3>
		    <h6 class="card-text">1 : <?= $model->getVolunteerRatio() ?></h6>
		  </div>
		  <div class="card-footer">
		  	<h4 class="small">Volunteers</h4>
		  </div>
		</div>
		<div class="card mb-3 col-xs-4" style="background-color: #FFD54F">
		  <div class="card-body">
		    <h3 class="card-text"><?= $model->getTotalStreaming() ?></h3>
		  </div>
		  <div class="card-footer">
		  	<h4 class="small">Streaming</h4>
		  </div>
		</div>
	</div>

	<div class="row">
		<div class="card mb-3 col-xs-4" style="background-color: #FFB74D">
		  <div class="card-body">
		    <h3 class="card-text"><?= $model->getTotalBaptism() ?></h3>
		  </div>
		  <div class="card-footer">
		  	<h4 class="small">Baptism</h4>
		  </div>
		</div>
		<div class="card mb-3 col-xs-4" style="background-color: #FF8A65">
		  <div class="card-body">
		    <h3 class="card-text"><?= $model->getTotalAltarCall() ?></h3>
		  </div>
		  <div class="card-footer">
		  	<h4 class="small">Altar Call</h4>
		  </div>
		</div>
	</div>

	<h1 class="small" style="text-decoration: underline">Detail Attendance</h1>
	<div class="row col-xs-12">
		<div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
    		<?php foreach($model->iwreport->all() as $_iwreport) { ?>
    		<div class="panel panel-default">
    			<a title="Tab <?= $_iwreport->service_id ?>" aria-controls="collapse<?= $_iwreport->service_id ?>" aria-expanded="false" href="#collapse<?= $_iwreport->service_id ?>" data-parent="#accordion" data-toggle="collapse" id="heading<?= $_iwreport->service_id ?>" role="tab" class="panel-heading collapsed" style="background-color: #AED581">
    				<span class="glyphicon icon-indicator"></span>
    				<span class="panel-title"><?= $_iwreport->service->namaibadah ?></span>
    			</a>
        		
        		<div aria-labelledby="heading<?= $_iwreport->service_id ?>" role="tabpanel" class="panel-collapse collapse" id="collapse<?= $_iwreport->service_id ?>" aria-expanded="false">
            		<div class="panel-body">
                		<h4>Congregation</h4>
                		<p>Male : <?= $_iwreport->male ?> | <?= $_iwreport->getMalePercentage() ?></p>
                		<p>Female : <?= $_iwreport->female ?> | <?= $_iwreport->getFemalePercentage() ?></p>

                		<h4>Volunteers</h4>
                		<p>Usher : <?= $_iwreport->usher ?></p>
                		<p>Spro : <?= $_iwreport->spro ?></p>
                		<p>PAW : <?= $_iwreport->paw ?></p>
                		<p>Multimedia : <?= $_iwreport->multimedia ?></p>
                		<p>Interpreter : <?= $_iwreport->interpreter ?></p>
                		<p>Prayer : <?= $_iwreport->prayer ?></p>
                		<p>IHUB : <?= $_iwreport->ihub ?></p>

                		<h4>Streaming</h4>
                		<p>Indonesia : <?= $_iwreport->mstv ?></p>
                		<p>English : <?= $_iwreport->mstv_en ?></p>
                		<p>Chinese : <?= $_iwreport->mstv_cn ?></p>

						<h4>Additional Data</h4>
                		<p>AltarCall : <?= $_iwreport->altarcall ?></p>
                		<p>AltarCall2 : <?= $_iwreport->altarcall2 ?></p>
                		<p>Baptism Male : <?= $_iwreport->bmale ?></p>
                		<p>Baptism Female : <?= $_iwreport->bfemale ?></p>                		
            		</div>
       			</div>
    		</div>   
            <?php } ?> 	
		</div>
	</div>	

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php } ?>

</div>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>