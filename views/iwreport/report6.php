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
			<div class="col-xs-6">    
				<?= $form->field($model, 'date_id')->dropDownList(ArrayHelper::map(Iwreport::find()->select(['date_id','DATE_FORMAT(date_id, "%d %b %Y") date_name'])->distinct()->orderBy(['date_id'=>SORT_DESC])->all(),'date_id','date_name'),['prompt'=>'Pilih Tanggal',])->label(false) ?>    
			</div>
			<div class="col-xs-6">
			    <div class="form-group">
			    	<?= Html::submitButton('Lihat Laporan', ['class'=>'btn btn-success']) ?>
			    </div>
			</div>
		<?php ActiveForm::end(); ?>
	</div>

<?php if(isset($model->date_id)){ ?>
	<div class="row">
		<h5>Iclick Weekly Report | 

			<?php 
		    function getWeeks($date, $rollover)
		    {
		        $cut = substr($date, 0, 8);
		        $daylen = 86400;

		        $timestamp = strtotime($date);
		        $first = strtotime($cut . "00");
		        $elapsed = ($timestamp - $first) / $daylen;

		        $weeks = 1;

		        for ($i = 1; $i <= $elapsed; $i++)
		        {
		            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
		            $daytimestamp = strtotime($dayfind);

		            $day = strtolower(date("l", $daytimestamp));

		            if($day == strtolower($rollover))  $weeks ++;
		        }

		        return $weeks;
		    }


		    //
		    $weekNum = getWeeks($model->date_id, "monday");
		    if ($weekNum == 1) {
		    	echo "Minggu Perpuluhan";
		    } elseif ($weekNum == 2) {
		    	echo "Minggu Perjamuan Kudus";
		    } elseif ($weekNum == 3) {
		    	echo "Minggu Misi & Diakonia";
		    } else {
		    	echo "Minggu Ke ".$weekNum;
		    }
		    ?>


		</h5>
		<h6>Speaker : <?=  $model->iwreport1->speaker->speakername ?></h6>
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
		    <h6 class="card-text">Male <?= $model->getTotalMalePercentage() ?></span> | Female <?= $model->getTotalFemalePercentage() ?></h6>
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
    		
    		<div class="panel panel-default">
    			<a title="Tab 1" aria-controls="collapse1" aria-expanded="false" href="#collapse1" data-parent="#accordion" data-toggle="collapse" id="heading1" role="tab" class="panel-heading collapsed" style="background-color: #AED581">
    				<span class="glyphicon icon-indicator"></span>
    				<span class="panel-title">Ibadah 1</span>
    			</a>
        		
        		<div aria-labelledby="heading1" role="tabpanel" class="panel-collapse collapse" id="collapse1" aria-expanded="false">
            		<div class="panel-body">
                		<h4>Congregation</h4>
                		<p>Male : <?= $model->iwreport1->male ?> | <?= $model->iwreport1->getMalePercentage() ?></p>
                		<p>Female : <?= $model->iwreport1->female ?> | <?= $model->iwreport1->getFemalePercentage() ?></p>

                		<h4>Volunteers</h4>
                		<p>Usher : <?= $model->iwreport1->usher ?></p>
                		<p>Spro : <?= $model->iwreport1->spro ?></p>
                		<p>PAW : <?= $model->iwreport1->paw ?></p>
                		<p>Multimedia : <?= $model->iwreport1->multimedia ?></p>
                		<p>Interpreter : <?= $model->iwreport1->interpreter ?></p>
                		<p>Prayer : <?= $model->iwreport1->prayer ?></p>
                		<p>IHUB : <?= $model->iwreport1->ihub ?></p>

                		<h4>Streaming</h4>
                		<p>Indonesia : <?= $model->iwreport1->mstv ?></p>
                		<p>English : <?= $model->iwreport1->mstv_en ?></p>
                		<p>Chinese : <?= $model->iwreport1->mstv_cn ?></p>

						<h4>Additional Data</h4>
                		<p>AltarCall : <?= $model->iwreport1->altarcall ?></p>
                		<p>AltarCall2 : <?= $model->iwreport1->altarcall2 ?></p>
                		<p>Baptism Male : <?= $model->iwreport1->bmale ?></p>
                		<p>Baptism Female : <?= $model->iwreport1->bfemale ?></p>                		
            		</div>
       			</div>
    		</div>

    		<div class="panel panel-default">
    			<a title="Tab 2" aria-controls="collapse2" aria-expanded="false" href="#collapse2" data-parent="#accordion" data-toggle="collapse" id="heading2" role="tab" class="panel-heading collapsed" style="background-color: #AED581">
    				<span class="glyphicon icon-indicator"></span>
    				<span class="panel-title">Ibadah 2</span>
    			</a>
        		
        		<div aria-labelledby="heading2" role="tabpanel" class="panel-collapse collapse" id="collapse2" aria-expanded="false">
            		<div class="panel-body">
                		<h4>Congregation</h4>
                		<p>Male : <?= $model->iwreport2->male ?> | <?= $model->iwreport2->getMalePercentage() ?></p>
                		<p>Female : <?= $model->iwreport2->female ?> | <?= $model->iwreport2->getFemalePercentage() ?></p>

                		<h4>Volunteers</h4>
                		<p>Usher : <?= $model->iwreport2->usher ?></p>
                		<p>Spro : <?= $model->iwreport2->spro ?></p>
                		<p>PAW : <?= $model->iwreport2->paw ?></p>
                		<p>Multimedia : <?= $model->iwreport2->multimedia ?></p>
                		<p>Interpreter : <?= $model->iwreport2->interpreter ?></p>
                		<p>Prayer : <?= $model->iwreport2->prayer ?></p>
                		<p>IHUB : <?= $model->iwreport2->ihub ?></p>

                		<h4>Streaming</h4>
                		<p>Indonesia : <?= $model->iwreport2->mstv ?></p>
                		<p>English : <?= $model->iwreport2->mstv_en ?></p>
                		<p>Chinese : <?= $model->iwreport2->mstv_cn ?></p>

						<h4>Additional Data</h4>
                		<p>AltarCall : <?= $model->iwreport2->altarcall ?></p>
                		<p>AltarCall2 : <?= $model->iwreport2->altarcall2 ?></p>
                		<p>Baptism Male : <?= $model->iwreport2->bmale ?></p>
                		<p>Baptism Female : <?= $model->iwreport2->bfemale ?></p>
            		</div>
        		</div>
    		</div>

    		<div class="panel panel-default">
    			<a title="Tab 3" aria-controls="collapse3" aria-expanded="false" href="#collapse3" data-parent="#accordion" data-toggle="collapse" id="heading3" role="tab" class="panel-heading collapsed" style="background-color: #AED581">
    				<span class="glyphicon icon-indicator"></span>
    				<span class="panel-title">Ibadah 3</span>
    			</a>

        		<div aria-labelledby="heading3" role="tabpanel" class="panel-collapse collapse" id="collapse3" aria-expanded="false">
            		<div class="panel-body">
                		<h4>Congregation</h4>
                		<p>Male : <?= $model->iwreport3->male ?> | <?= $model->iwreport3->getMalePercentage() ?></p>
                		<p>Female : <?= $model->iwreport3->female ?> | <?= $model->iwreport3->getFemalePercentage() ?></p>

                		<h4>Volunteers</h4>
                		<p>Usher : <?= $model->iwreport3->usher ?></p>
                		<p>Spro : <?= $model->iwreport3->spro ?></p>
                		<p>PAW : <?= $model->iwreport3->paw ?></p>
                		<p>Multimedia : <?= $model->iwreport3->multimedia ?></p>
                		<p>Interpreter : <?= $model->iwreport3->interpreter ?></p>
                		<p>Prayer : <?= $model->iwreport3->prayer ?></p>
                		<p>IHUB : <?= $model->iwreport3->ihub ?></p>

                		<h4>Streaming</h4>
                		<p>Indonesia : <?= $model->iwreport3->mstv ?></p>
                		<p>English : <?= $model->iwreport3->mstv_en ?></p>
                		<p>Chinese : <?= $model->iwreport3->mstv_cn ?></p>

						<h4>Additional Data</h4>
                		<p>AltarCall : <?= $model->iwreport3->altarcall ?></p>
                		<p>AltarCall2 : <?= $model->iwreport3->altarcall2 ?></p>
                		<p>Baptism Male : <?= $model->iwreport3->bmale ?></p>
                		<p>Baptism Female : <?= $model->iwreport3->bfemale ?></p>
            		</div>
        		</div>
    		</div>

    		<div class="panel panel-default">
    			<a title="Tab 4" aria-controls="collapse4" aria-expanded="false" href="#collapse4" data-parent="#accordion" data-toggle="collapse" id="heading4" role="tab" class="panel-heading collapsed" style="background-color: #AED581">
    				<span class="glyphicon icon-indicator"></span>
    				<span class="panel-title">Ibadah 4</span>
    			</a>
        		
        		<div aria-labelledby="heading4" role="tabpanel" class="panel-collapse collapse" id="collapse4" aria-expanded="false">
            		<div class="panel-body">
                		<h4>Congregation</h4>
                		<p>Male : <?= $model->iwreport4->male ?> | <?= $model->iwreport4->getMalePercentage() ?></p>
                		<p>Female : <?= $model->iwreport4->female ?> | <?= $model->iwreport4->getFemalePercentage() ?></p>

                		<h4>Volunteers</h4>
                		<p>Usher : <?= $model->iwreport4->usher ?></p>
                		<p>Spro : <?= $model->iwreport4->spro ?></p>
                		<p>PAW : <?= $model->iwreport4->paw ?></p>
                		<p>Multimedia : <?= $model->iwreport4->multimedia ?></p>
                		<p>Interpreter : <?= $model->iwreport4->interpreter ?></p>
                		<p>Prayer : <?= $model->iwreport4->prayer ?></p>
                		<p>IHUB : <?= $model->iwreport4->ihub ?></p>

                		<h4>Streaming</h4>
                		<p>Indonesia : <?= $model->iwreport4->mstv ?></p>
                		<p>English : <?= $model->iwreport4->mstv_en ?></p>
                		<p>Chinese : <?= $model->iwreport4->mstv_cn ?></p>

						<h4>Additional Data</h4>
                		<p>AltarCall : <?= $model->iwreport4->altarcall ?></p>
                		<p>AltarCall2 : <?= $model->iwreport4->altarcall2 ?></p>
                		<p>Baptism Male : <?= $model->iwreport4->bmale ?></p>
                		<p>Baptism Female : <?= $model->iwreport4->bfemale ?></p>
            		</div>
        		</div>
    		</div>
		</div>
	</div>	

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php } ?>






<!--
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>19.720</h3>		
				</div>
				<div class="panel-footer">
					<h1 class="small">Total Attendance</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>18000</h3>		
				</div>
				<div class="panel-footer">
					<h1 class="small">Total Jemaat</h1>
				</div>
			</div>
		</div>

		<div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>720</h3>
				</div>
				<div class="panel-footer">
					<h1 class="small">Total Volunteers</h1>
				</div>
			</div>
		</div>

		<div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>1000</h3>
				</div>
				<div class="panel-footer">
					<h1 class="small">Total Streaming</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>70</h3>		
				</div>
				<div class="panel-footer">
					<h1 class="small">Baptism</h1>
				</div>
			</div>
		</div>

		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>3000</h3>
				</div>
				<div class="panel-footer">
					<h1 class="small">Altar Call</h1>
				</div>
			</div>
		</div>
	</div>
-->

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