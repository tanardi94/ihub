<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ErformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'iRequest Report';

?>
<div class="erform-report">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <p><?= Html::a('Request Here', ['create'], ['class' => 'btn btn-success']) ?></p>
        <h5>Check the status of your request below</h5>
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'etype',
                'ename',
                'evenue',
                'est_attd',
                // 'e_startdate',
                // 'e_enddate',
                // 'e_weekly',
                // 'pic_name',
                // 'pic_phone',
                // 'pic_email:email',
                // 'pic_ministry',
                // 'service_req',
                // 'notes',
                 'status',
                // 'timestamp',
            ],
        ]); ?>
    </div>

</div>
