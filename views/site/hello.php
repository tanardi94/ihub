<?php 
use dosamigos\highcharts\HighCharts;
use yii\helpers\Html;
use yii\bootstrap\bootstrapAssets;

$this->title = 'ICLICK WEEKLY REPORT';

?>

<div class="site-hello">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- SERVICE INFORMATION -->
    <div class='row'>
        <div class='col-lg-12'>
            <p>ICLICK WEEKLY REPORT | Ps. Caleb Natanielliem | 14 May 2017</p>
            <span><p>Holy Communion Week | GMS Cempaka</p></span>
        </div>
    </div>
    
    <!-- TEXT -->
    <div class='row'>
        <div class ='col-lg-6' style='text-align: center;'>
            <p style='font-size:60px; font-weight: bold;'>
                11,042
            </p>
            <p style='font-size:32px; font-weight: bold;'>
                Total Attendance
            </p>
        </div>
        <div class ='col-lg-6' style='text-align: center;'>
            <p style='font-size:60px; font-weight: bold;'>
                11,042
            </p>
            <p style='font-size:32px; font-weight: bold;'>
                Total Attendance
            </p>
        </div>
    </div>

    <!-- Chart -->   
    <div class='row'>
        <!-- BAR CHART -->
        <div class='col-lg-6'>
            <?=        
                HighCharts::widget([
                   
                        'clientOptions' => [
                        'chart' => [
                            'type' => 'bar'
                        ],
                        'title' => [
                            'text' => 'Attendance'
                        ],
                            'xAxis' => [
                                'categories' => [
                                'Service 1',
                                'Service 2',
                                'Service 3',
                                'Service 4'
                                ]
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
                            ['name' => 'Total Attendance', 'data' => [2500, 3200, 1800, 600]],
                        ],

                        ],
                ]);
            ?>
        </div>
    </div>

    <div class='row'>
        <!-- COLUMN CHART -->
        <div class='col-lg-6'>
            <?=        
                HighCharts::widget([
                   
                        'clientOptions' => [
                        'chart' => [
                            'type' => 'column'
                        ],
                        'title' => [
                            'text' => 'Details Attendance'
                        ],
                            'xAxis' => [
                                'categories' => [
                                'Members',
                                'Volunteer',
                                'MSTV'
                                ]
                            ],
                        'yAxis' => [
                            'title' => [
                                'text' => ''
                            ]
                        ],
                        'series' => [
                            ['name' => 'Service 1', 'data' => [1790, 104, 938]],
                            ['name' => 'Service 2', 'data' => [2538, 100, 663]],
                            ['name' => 'Service 3', 'data' => [2310, 106, 528]],
                            ['name' => 'Service 4', 'data' => [1437, 56, 472]]
                        ],
                        'dataLabels' => [
                            ['enable' => 'true', 'color' => '#FFFFF']
                            ]
                        ],
                ]);
            ?>
        </div>
    </div>

    <code><?= __FILE__ ?></code>

</div>

