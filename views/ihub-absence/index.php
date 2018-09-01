<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IhubAbsence\IhubAbsenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ihub Absence Report';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-absence-index">
<div class="row" style='text-align:center;font-weight: bold;'>
            
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
                        <?= $ontime_members."/".count($allmembers) ?>
                    </p>
                    <p style='font-size:16px;'>On time</p>
                </div>
            </div>
        </div>
        
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
</div>
