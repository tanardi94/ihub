<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IhubIbadah\IhubIbadahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ihub Ibadahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-ibadah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ihub Ibadah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ibadah',
            'namaibadah',
            'awal',
            'selesai',
            'jamawalibadah',
            // 'jamakhiribadah',
            // 'batasjampulang',
            // 'batasjamterlambat',
            // 'keterangan',
            // 'weekly',
            // 'creation_date',
            // 'created_by',
            // 'last_update_date',
            // 'last_updated_by',
            // 'status',
            // 'IdGereja',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
