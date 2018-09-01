<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\TblSchedule\TblSchedule;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IwreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedule Reports';
?>

<style>
    
    #tableIclick{
        width: 100%;
    }

    #tableHeader th{
        text-align: center;
        background-color: AliceBlue;
    }
    
    #labelJemaat{
        background-color: aquamarine;
    }

    #labelVolunteers{
        background-color: aquamarine;
    }

    #labelStreaming{
        background-color: aquamarine;
    }

    table, th, td {
        border: 1px solid black; 
    }
    
    th {
        height: 25px;
    }

    td {
        text-align: center;
    }
    

</style>

<!--
<div class="container iwreport">
  <div class="row">
    <?php $form = ActiveForm::begin(); ?>
  <div class="col-lg-4">    
    <?= $form->field($model, 'tgl')->dropDownList(ArrayHelper::map(TblSchedule::find()->select(['tgl','DATE_FORMAT(tgl, "%b %Y") date_name'])->distinct()->orderBy(['tgl'=>SORT_DESC])->all(),'tgl','date_name'),['prompt'=>'Pilih Tanggal',])->label(false) ?>    
  </div>
  <div class="col-lg-2">
    <div class="form-group">
        <?= Html::submitButton('Lihat Laporan', ['class'=>'btn btn-success']) ?>
        <?= Html::a('GeneratePDF', ['report1'], ['class' => 'btn btn-warning']) ?>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>

<?php if(isset($model->tgl)){ ?>
-->

    <h3>Saturday</h3>
    <div class="table-responsive">
        <table id="tableIclick">
            <thead>
                <!-- Header -->
                <tr id="tableHeader">
                    <th rowspan="2">Ibadah</th>
                    <th>Week 1</th>
                    <th>Week 2</th>
                    <th>Week 3</th>
                    <th>Week 4</th>
                    <th>Week 5</th>
                </tr>

                <tr id="tableHeader">
                    <th>2017-01-01</th>
                    <th>2017-01-07</th>
                    <th>2017-01-21</th>
                    <th>2017-01-28</th>
                    <th>2017-01-31</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>AOG Teen</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
                <tr>
                    <td>Pro M</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
            </tbody>
        </table>


    <h3>Sunday</h3>
    <div class="table-responsive">
        <table id="tableIclick">
            <thead>
                <!-- Header -->
                <tr id="tableHeader">
                    <th rowspan="2">Ibadah</th>
                    <th>Week 1</th>
                    <th>Week 2</th>
                    <th>Week 3</th>
                    <th>Week 4</th>
                    <th>Week 5</th>
                </tr>

                <tr id="tableHeader">
                    <th>2017-01-01</th>
                    <th>2017-01-07</th>
                    <th>2017-01-21</th>
                    <th>2017-01-28</th>
                    <th>2017-01-31</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Umum 1</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
                <tr>
                    <td>Umum 2</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
                <tr>
                    <td>AOG Youth</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
                <tr>
                    <td>Umum 3</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
                <tr>
                    <td>Umum 4</td>
                    <td>Team 1</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                    <td>Team 2</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php } ?> 