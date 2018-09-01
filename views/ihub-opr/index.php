<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IhubOpr\IhubOprSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ihub Oprs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-opr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ihub Opr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdOpr',
            'Kode',
            'Nama',
            'Email:email',
            'IdGroup',
            // 'SPV',
            // 'TglLahir',
            // 'Posisi',
            // 'password',
            // 'comment_ontime',
            // 'comment_latetime',
            // 'creation_date',
            // 'created_by',
            // 'last_update_date',
            // 'last_updated_by',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
