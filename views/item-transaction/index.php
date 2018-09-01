<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trx_no',
            'category',
            'type',
            'item_name',
            'qty',
            // 'request_date',
            // 'pickup_date',
            // 'return_date',
            // 'description:ntext',
            // 'pic_request',
            // 'pic_approval',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
