<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchBox;
use dosamigos\datepicker\DatePicker;
use yii\web\NotFoundHttpException;
use dosamigos\highcharts\HighCharts;
use app\modules\absence\models\IhubIbadah\IhubIbadah;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IhubAbsence\IhubAbsenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ihub Absence Report';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-absence-index">
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['ihub-absence/index'])]); ?>
<div class="row">
    <div class="col-lg-6"><?= DatePicker::widget([
    'name' => 'service_date',
    'value' => date("Y-m-d"),
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>
   </div>
    <div class="col-lg-2">
        <div class="form-group">
            <?= Html::submitButton('View Report', ['name' => 'report_button','class'=>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="row" style='text-align:center;font-weight: bold;'>
<?php if(isset($service_date)) {
        if($dataProvider->totalCount <= 0)
        {
            echo "DATA NOT FOUND";
        }
        else
        {?>

            
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(201, 248, 255);">
                    <p style='font-size:38px;'>
                       Ibadah
                    </p>
                    <p style='font-size:16px;'><?= $namaibadah ?></p>
                </div>         
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(209, 255, 94);">
                    <p style='font-size:38px;'>
                        <?= count($allmembers) ?>
                    </p>
                    <p style='font-size:16px;'>IHUB Team <?= $allmembers[0]["IdGroup"] ?> Volunteers</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(255, 201, 94);">
                    <p style='font-size:38px;'>
                        <?= $late_members."/".count($allmembers) ?>
                    </p>
                    <p style='font-size:16px;'>Late</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(209, 135, 255);">
                    <p style='font-size:38px;'>
                        <?= count($allmembers)-$late_members."/".count($allmembers) ?>
                    </p>
                    <p style='font-size:16px;'>On time</p>
                </div>
            </div>
        </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?=
        HighCharts::widget([
            'clientOptions' => [
                'title' => [
                     'text' => 'Punctuality Statistics'
                     ],
                'plotOptions' => [
                        'pie' => [
                            'cursor' => 'pointer',
                        ],
                    ],
        
                'series' => [
                    [
                    'type'=>'pie',                                                             
                    'name'=>'Amount',
                    'data' => [
                        [
                            'name' => 'On Time Members',
                            'y' => count($allmembers)-$late_members,
                        ],
                        [
                            'name' => 'Late Members',
                            'y' => $late_members,
                        ],
                    ],
                ]
                ]
            ]
        ]);
        
    ?>

    <p>
<!--
        <?= Html::a('Create Ihub Absence', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Report', ['report'], ['class' => 'btn btn-success']) ?>
-->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idOpr',
            [
                'attribute' => 'idOpr0',
                'label' => 'Nama Operator',
                'value' => 'idOpr0.Nama',
            ],
            'tglabsence',
            [
                'attribute' => 'ibadah0',
                'label' => 'Service',
                'value' => 'ibadah0.namaibadah',
            ],
//            'ibadah',
            'status_ontime',
            
//            'creation_date',
            // 'created_by',
            // 'last_update_date',
            // 'last_updated_by',
            // 'status',
//             'IdGroup',
            // 'waktumasuk',
            // 'waktukeluar',

            ['class' => 'yii\grid\ActionColumn',
              'template'=>'{view} {update} {send}',]
        ],
    ]); ?>
<?php 
    Pjax::end();
}
}?>