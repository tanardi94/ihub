<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\highcharts\HighCharts;
use yii\bootstrap\bootstrapAssets;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ErformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '[REPORT] Presensi Usher';
?>

<div class="index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php $form = ActiveForm::begin(); ?>
    
    <!-- Small boxes (Stat box) -->
    <div class="row" style='text-align:center;font-weight: bold;'>
        
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(201, 248, 255);">
                <p style='font-size:38px;'>
                    30
                </p>
                <p style='font-size:16px;'>Kebaktian Umum 1</p>
            </div>         
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(209, 255, 94);">
                <p style='font-size:38px;'>
                    50
                </p>
                <p style='font-size:16px;'>Kebaktian Umum 2</p>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(255, 201, 94);">
                <p style='font-size:38px;'>
                    70
                </p>
                <p style='font-size:16px;'>Kebaktian Umum 3</p>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="card" style="background-color:rgb(209, 135, 255);">
                <p style='font-size:38px;'>
                    80
                </p>
                <p style='font-size:16px;'>Kebaktian Umum 4</p>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
    <?=
        HighCharts::widget([
            'clientOptions' => [
                'chart' => [
                        'type' => 'bar'
                ],
                'title' => [
                     'text' => ''
                     ],
                'xAxis' => [
                    'categories' => [
                        'Kebaktian Umum 1',
                        'Kebaktian Umum 2',
                        'Kebaktian Umum 3',
                        'Kebaktian Umum 4',
                    ]
                ],
                'yAxis' => [
                    'title' => [
                        'text' => 'Total Presensi'
                    ]
                ],
                'series' => [
                    ['name' => 'Total Presensi', 'data' => [30,50,70,80]]
                ]
            ]
        ]);
    ?>
        </div>

        <div class="col-lg-6">
    <?=
        HighCharts::widget([
            'clientOptions' => [
                'chart' => [
                        'type' => 'line'
                ],
                'title' => [
                     'text' => ''
                     ],
                'xAxis' => [
                    'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                ],
                'yAxis' => [
                    'title' => [
                        'text' => 'Total Presensi'
                    ]
                ],
                'plotOptions' => [
                    'line' => [
                        'dataLabels' => [
                            'enabled' => 'true'
                        ],
                        'enableMouseTracking' => 'false'
                    ]
                ],
                'series' => [
                    ['name' => 'Team Pagi', 'data' => [8,4,11,30,11,2,22,16,19,28,1,23]],
                    ['name' => 'Team Siang', 'data' => [11,5,20,26,3,2,20,29,6,9,18,29]],
                    ['name' => 'Team Sore', 'data' => [29,19,3,5,4,25,26,28,10,15,13,5]],
                    ['name' => 'Team Malam', 'data' => [4,10,20,13,13,30,13,29,11,15,9,6]],
                ]
            ]
        ]);
    ?>
        </div>
    </div>
    
<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Personal Presence By Month</h3>

            <!--
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            -->
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th rowspan="2" style="vertical-align: middle;">ID</th>
                  <th rowspan="2" style="vertical-align: middle;">User</th>
                  <th colspan="12" style="text-align: center;">Month</th>
                </tr>
                <tr>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>Mei</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Ags</th>
                    <th>Sep</th>
                    <th>Okt</th>
                    <th>Nov</th>
                    <th>Des</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Alexander Pierce</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td></td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Bob Doe</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Mike Doe</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                  <td style="font-weight:bold; color:red;">&#10008;</td>
                  <td style="color:green;">&#10004;</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

    <?php ActiveForm::end(); ?>
</div>