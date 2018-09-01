<?php

use yii\helpers\Html;
use dosamigos\highcharts\HighCharts;
use dosamigos\datepicker\DatePicker;

use app\models\Iwreport;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IwreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Iclick Weekly Reports';
?>

<?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?>

<div class="container">

	<!-- Small boxes (Stat box) -->
    <div class="row" style='text-align:center;font-weight: bold;'>
        
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(201, 248, 255);">
                <p style='font-size:38px;'>
                    <span class="glyphicon glyphicon-arrow-down"></span>13  
                </p>
                <p style='font-size:16px;'>Umum 1</p>
            </div>         
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(209, 255, 94);">
                <p style='font-size:38px;'>
                    <span class="glyphicon glyphicon-arrow-up"></span>14
                </p>
                <p style='font-size:16px;'>Umum 2</p>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(255, 201, 94);">
                <p style='font-size:38px;'>
                    15 
                </p>
                <p style='font-size:16px;'>Umum 3</p>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(209, 135, 255);">
                <p style='font-size:38px;'>
                    16 
                </p>
                <p style='font-size:16px;'>Umum 4</p>
            </div>
        </div>
    </div>
</div>

<?=
HighCharts::widget([
    'clientOptions' => [
        'chart' => [
                'type' => 'bar'
        ],
        'title' => [
             'text' => 'Fruit Consumption'
             ],
        'xAxis' => [
            'categories' => [
                'Apples',
                'Bananas',
                'Oranges'
            ]
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Fruit eaten'
            ]
        ],
        'series' => [
            ['name' => 'Jane', 'data' => [1, 0, 4]],
            ['name' => 'John', 'data' => [5, 7, 3]]
        ]
    ]
]);
?>