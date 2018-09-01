<?php


use dosamigos\highcharts\HighCharts;
use yii\web\JsExpression;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
$this->title = 'จำนวนผู้ป่วย(Patient) TYPEAREA มีค่าว่าง';
$this->params['breadcrumbs'][] = 'Solid Gauges Charts';
?>


<div style='display: none'>
    <?=
    Highcharts::widget([
        'scripts' => [
            'highcharts-more',
            //'themes/grid',
            //'modules/exporting',
            'modules/solid-gauge',
        ]
    ]);
    ?>
</div> 
<?php
//$webroot = Yii::$app->request->BaseUrl;
$this->registerJsFile('@web/js/chart-donut.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="panel panel-default"> 
    <div class="panel-heading"> <h3 class="panel-title"><span class="glyphicon glyphicon glyphicon-signal"></span> Solid Gauges Charts</h3> </div> 
    <div class="panel-body">
    <!--row1 -->
        <div class="row">
            <!-- col1-->
            <div class="col-md-3" style="text-align: center;">
                <?php
                $data1 = [];
                for ($i = 0; $i < count($chart1); $i++) {
                    $data1[] = $chart1[$i]['cc_hn'];
                }
                $js_cc1 = implode(",", $data1);
$this->registerJs("
                                var obj_div=$('#chart1');
                                gen_donut(obj_div,'ไม่ลงผลวินิจฉัย OPD',$js_cc1);
                             ");
                ?>
                <div id="chart1" style="width: 300px; height: 200px; float: left"></div>
            </div>
                <!-- col2-->
              <div class="col-md-3" style="text-align: center;">
                <?php
                $data2 = [];
                for ($i = 0; $i < count($chart2); $i++) {
                    $data2[] = $chart2[$i]['cc_hn'];
                }
                $js_cc2 = implode(",", $data2);

                $this->registerJs("
                                var obj_div=$('#chart2');
                                gen_donut(obj_div,'ไม่ลงผลวินิจฉัย IPD',$js_cc2);
                             ");
                ?>
                <div id="chart2" style="width: 300px; height: 200px; float: left"></div>
            </div>
			<!-- col3-->
				$this->registerJs("
                                var obj_div=$('#chart1');
                                gen_donut(obj_div,'ไม่ลงผลวินิจฉัย OPD',$js_cc1);
                             ");
                ?>
                <div id="chart1" style="width: 300px; height: 200px; float: left"></div>
            </div>
                <!-- col2-->
              <div class="col-md-3" style="text-align: center;">
                <?php
                $data2 = [];
                for ($i = 0; $i < count($chart2); $i++) {
                    $data2[] = $chart2[$i]['cc_hn'];
                }
                $js_cc2 = implode(",", $data2);

                $this->registerJs("
                                var obj_div=$('#chart2');
                                gen_donut(obj_div,'ไม่ลงผลวินิจฉัย IPD',$js_cc2);
                             ");
                ?>
                <div id="chart2" style="width: 300px; height: 200px; float: left"></div>
            </div>
			<!-- col3-->
              <div class="col-md-3" style="text-align: center;">
                <?php
                $data3 = [];
                for ($i = 0; $i < count($chart3); $i++) {
                    $data3[] = $chart3[$i]['cc_hn'];
                }
                $js_cc3 = implode(",", $data3);

                $this->registerJs("
                                var obj_div=$('#chart3');
                                gen_donut(obj_div,'TYPEAREA= NULL หรือ <>4',$js_cc3);
                             ");
                ?>
                <div id="chart3" style="width: 300px; height: 200px; float: left"></div>
            </div>
        <!-- col4-->

              <div class="col-md-3" style="text-align: center;">
                <?php
                $data3 = [];
                for ($i = 0; $i < count($chart3); $i++) {
                    $data3[] = $chart3[$i]['cc_hn'];
                }
                $js_cc3 = implode(",", $data3);

                $this->registerJs("
                                var obj_div=$('#chart3');
                                gen_donut(obj_div,'TYPEAREA= NULL หรือ <>4',$js_cc3);
                             ");
                ?>
                <div id="chart3" style="width: 300px; height: 200px; float: left"></div>
            </div>
        <!-- col4-->

