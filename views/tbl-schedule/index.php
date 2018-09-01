<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblSchedule\TblScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Schedules';
?>
<div class="tbl-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Schedule', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('View', ['report'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tgl',
            //'ibadah',
            ['attribute'=>'ibadah','value'=>'ibadah0.namaibadah',],
            //'IdGroup',
            ['attribute'=>'IdGroup','value'=>'idGroup.NamaGroup',],
            //'IdGereja',
            ['attribute'=>'IdGereja','value'=>'idGereja.NamaGereja',],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
