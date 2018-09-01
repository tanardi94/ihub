<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IwreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Iclick Weekly Reports';
?>
<div class="iwreport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('View Report', ['report1'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('View PDF', ['report'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('View Graph', ['report2'], ['class' => 'btn btn-primary']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_id',
            //service_id',
            ['attribute'=>'service_id','value'=>'service.namaibadah',],
            //'venue_id',
            //'speaker_id',
            ['attribute'=>'speaker_id','value'=>'speaker.speakername',],
            'team',
            // 'male',
            // 'female',
            // 'empty',
            // 'usher',
            // 'spro',
            // 'paw',
            // 'multimedia:datetime',
            // 'interpreter',
            // 'prayer',
            // 'ihub',
            // 'photography',
            // 'welcomer',
            // 'creamy',
            // 'hospitality',
            // 'altarcall',
            // 'altarcall2',
            // 'bmale',
            // 'bfemale',
            // 'mstv',
            // 'timestamp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
