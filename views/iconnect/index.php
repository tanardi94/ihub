<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataMembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'E-Certificate';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Broadcast Email', ['iconnect/broadcast'], ['class' => 'btn btn-success', 'data'=>[            
            'confirm' => 'Kamu akan mengirim E-mail ke seluruh anggota yang hadir dan tidak hadir. Apa kamu yakin?',            
        ],]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nij',
            'fullname',
            'nickname',
            'nij1.email',
            'iconnect_presence',
            [
               'label' => 'Keterangan',               
               'value' => function ($model) {
                   if($model->iconnect_presence==0){
                    return '-';
                   } else if($model->iconnect_presence==1){
                    return 'Tidak Hadir';
                   } else if($model->iconnect_presence==2){
                    return 'Hadir';
                   } else {
                    return '-';                    
                   }
               }
             ],
            ['class' => 'yii\grid\ActionColumn',
              'template'=>'{view} {update} {send}',
                'buttons'=>[
                  'send' => function ($url, $model) {     
                    return Html::a('<span class="glyphicon glyphicon-send"></span>', $url, [
                            'title' => Yii::t('yii', 'Send'),
                            'data'=>[            
                                'confirm' => 'Kamu akan mengirim E-mail sertifikat ke '.$model->fullname.'. Apa kamu yakin?',            
                            ]
                    ]);                                

                  }
              ]
            ],
        ],
    ]); ?>
</div>
