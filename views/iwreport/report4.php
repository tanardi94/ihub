<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchBox;
use dosamigos\datepicker\DateRangePicker;
use dosamigos\highcharts\HighCharts;


use app\models\Iwreport\Iwreport;

function isMobile() {
    if(isset($_SERVER["HTTP_USER_AGENT"])){
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    } else {
        return 0;
    }       
}

$this->title = 'Laporan Grafik';
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
    margin-bottom: 20px;
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

.iwreport table {
    text-align: center;
    background: black;
    color: white;
    width: 100%;
}
.iwreport table th {
    border: solid 1px #000 !important;
    vertical-align: middle !important;
    text-align: center;
}
.iwreport table td {    
    border: solid 1px #000 !important;
    vertical-align: middle !important;
}
.iwreport table tr {    
    border: solid 1px #000 !important;
}

.note-ibadah-1{
    background: #008ba3;
    color: black;
    font-weight: bold;
}
.note-ibadah-2{
    background: #6b9b37;
    color: black;
    font-weight: bold;    
}
.note-ibadah-3{
    background: #ffee58;
    color: black;
    font-weight: bold;    
}
.note-ibadah-4{
    background: #c77800;
    color: black;
    font-weight: bold;    
}
.flag {
    width: 24px;    
    margin-right: 6px;
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
        <div class="col-lg-6">
            <?php
                $categories = array();
                $totalIbadah = array();
                foreach($model->iwreport->all() as $_iwreport) { 
                    $categories[] = $_iwreport->service->namaibadah;
                    $totalIbadah[] = $_iwreport->getTotalIbadah();
                }
                echo HighCharts::widget([
                'clientOptions' => [
                    'chart' => [
                            'type' => 'bar'
                    ],
                    'title' => [
                         'text' => 'Total Attendance by Service'
                         ],
                    'xAxis' => [
                        'categories' => $categories
                    ],
                    'yAxis' => [
                        'title' => [
                            'text' => ''
                        ]
                    ],
                    'plotOptions' => [
                                'bar' => [
                                    'dataLabels' => [
                                        'enabled' => true
                                    ],
                                    'enableMouseTracking' => false
                                ]
                    ],
                    'series' => [
                        ['name' => 'Total Kehadiran', 'data' => $totalIbadah],
                    ]
                ]
                ]);
            ?>
        </div>
        <div class="col-lg-6">
            <?php        
                $series = array();
                foreach($model->iwreport->all() as $_iwreport) { 
                    $arr = array();
                    $arr['name'] = $_iwreport->service->namaibadah;

                    $data = array();
                    $data[0] = $_iwreport->getTotalJemaat();
                    $data[1] = $_iwreport->getTotalVolunteer();
                    $data[2] = $_iwreport->getTotalStreaming();

                    $arr['data'] = $data;

                    $series[] = $arr;                    
                }
                    echo HighCharts::widget([
                       
                            'clientOptions' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => [
                                'text' => 'Details Attendance'
                            ],
                                'xAxis' => [
                                    'categories' => [
                                    'Congregations',
                                    'Volunteers',
                                    'MSTV'
                                    ]
                                ],
                            'yAxis' => [
                                'title' => [
                                    'text' => ''
                                ]
                            ],
                            'series' => $series,
                            'plotOptions' => [
                                'column' => [
                                    'dataLabels' => [
                                        'enabled' => true
                                    ],
                                ]
                            ],
                            ],
                    ]);
                ?>
        </div>
    </div>
    <?php if(!isMobile()){ ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="8">ANALYST RATIO</th>
                </tr>
                <tr>
                    <th colspan="2">Gender</th>
                    <th colspan="3">Volunteer</th>
                    <th colspan="3">Streaming</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->iwreport->all() as $_iwreport) { ?>
                <tr>
                    <td colspan="8" class="note-ibadah-1"><?= $_iwreport->service->namaibadah ?></td>
                </tr>
                <tr>
                    <td><?= $_iwreport->getMalePercentage() ?></td>
                    <td><?= $_iwreport->getFemalePercentage() ?></td>
                    <td colspan="3"><?= $_iwreport->getVolunteerRatio() ?></td>
                    <td><?= $_iwreport->getStreamingInPercentage() ?></td>
                    <td><?= $_iwreport->getStreamingEnPercentage() ?></td>
                    <td><?= $_iwreport->getStreamingCnPercentage() ?></td>
                </tr>
                <tr>
                    <td><?= $_iwreport->male ?></td>
                    <td><?= $_iwreport->female ?></td>
                    <td><?= $_iwreport->getTotalJemaat() ?></td>
                    <td>:</td>
                    <td><?= $_iwreport->getTotalVolunteer() ?></td>
                    <td><?= $_iwreport->mstv ?></td>
                    <td><?= $_iwreport->mstv_en ?></td>
                    <td><?= $_iwreport->mstv_cn ?></td>
                </tr>  
                <?php } ?>              
            </tbody>
            <tfoot>
                <th>Male</th>
                <th>Female</th>
                <th colspan="3"></th>
                <th><img src="<?= Url::base() ?>/id.svg" alt="Indonesia" class="flag"/>Indonesia</th>
                <th><img src="<?= Url::base() ?>/gb.svg" alt="English" class="flag"/>English</th>
                <th><img src="<?= Url::base() ?>/cn.svg" alt="Chinese" class="flag"/>Chinese</th>
            </tfoot>
        </table>
    </div>
    <?php } else { ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="8">ANALYST RATIO</th>
                </tr>
                <tr>
                    <th colspan="2">Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->iwreport->all() as $_iwreport) { ?>
                <tr>
                    <td colspan="2" class="note-ibadah-1"><?= $_iwreport->service->namaibadah ?></td>
                </tr>
                <tr>
                    <td><?= $_iwreport->getMalePercentage() ?></td>
                    <td><?= $_iwreport->getFemalePercentage() ?></td>
                </tr>
                <tr>
                    <td><?= $_iwreport->male ?></td>
                    <td><?= $_iwreport->female ?></td>
                </tr>  
                <?php } ?>              
            </tbody>
            <tfoot>
                <th>Male</th>
                <th>Female</th>
            </tfoot>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3">ANALYST RATIO</th>
                </tr>
                <tr>                    
                    <th colspan="3">Volunteer</th>                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->iwreport->all() as $_iwreport) { ?>
                <tr>
                    <td colspan="3" class="note-ibadah-1"><?= $_iwreport->service->namaibadah ?></td>
                </tr>
                <tr>                    
                    <td colspan="3"><?= $_iwreport->getVolunteerRatio() ?></td>                    
                </tr>
                <tr>                    
                    <td><?= $_iwreport->getTotalJemaat() ?></td>
                    <td>:</td>
                    <td><?= $_iwreport->getTotalVolunteer() ?></td>                    
                </tr>  
                <?php } ?>              
            </tbody>
            <tfoot>
                <th colspan="3"></th>
            </tfoot>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3">ANALYST RATIO</th>
                </tr>
                <tr>
                    <th colspan="3">Streaming</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->iwreport->all() as $_iwreport) { ?>
                <tr>
                    <td colspan="3" class="note-ibadah-1"><?= $_iwreport->service->namaibadah ?></td>
                </tr>
                <tr>
                    <td><?= $_iwreport->getStreamingInPercentage() ?></td>
                    <td><?= $_iwreport->getStreamingEnPercentage() ?></td>
                    <td><?= $_iwreport->getStreamingCnPercentage() ?></td>
                </tr>
                <tr>
                    <td><?= $_iwreport->mstv ?></td>
                    <td><?= $_iwreport->mstv_en ?></td>
                    <td><?= $_iwreport->mstv_cn ?></td>
                </tr>  
                <?php } ?>              
            </tbody>
            <tfoot>
                <th><img src="<?= Url::base() ?>/id.svg" alt="Indonesia" class="flag"/>Indonesia</th>
                <th><img src="<?= Url::base() ?>/gb.svg" alt="English" class="flag"/>English</th>
                <th><img src="<?= Url::base() ?>/cn.svg" alt="Chinese" class="flag"/>Chinese</th>
            </tfoot>
        </table>
    </div>
    <?php } ?>
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