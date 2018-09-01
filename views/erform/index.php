<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ErformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'iRequest Forms';

?>
<div class="erform-index">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Request Here', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <!-- Small boxes (Stat box) -->
        <div class="row" style='text-align:center;font-weight: bold;'>
            
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(201, 248, 255);">
                    <p style='font-size:38px;'>
                        <?=
                            $count = count($erform);
                        ?>  
                    </p>
                    <p style='font-size:16px;'>Healing Crusade</p>
                </div>         
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(209, 255, 94);">
                    <p style='font-size:38px;'>
                        <?=
                            $count = count($erform2);
                        ?> 
                    </p>
                    <p style='font-size:16px;'>NonHealing Crusade</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(255, 201, 94);">
                    <p style='font-size:38px;'>
                        <?=
                            $count = count($erform3);
                        ?> 
                    </p>
                    <p style='font-size:16px;'>Pop Up</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card" style="background-color:rgb(209, 135, 255);">
                    <p style='font-size:38px;'>
                        <?=
                            $count = count($erform4);
                        ?> 
                    </p>
                    <p style='font-size:16px;'>Weekly</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                // 'etype',
                'ename',
                'evenue',
                'est_attd',
                'e_startdate',
                // 'e_enddate',
                // 'e_weekly',
                'pic_name',
                // 'pic_phone',
                // 'pic_email:email',
                // 'pic_ministry',
                // 'service_req',
                // 'notes',
                'status',
                // 'timestamp',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
