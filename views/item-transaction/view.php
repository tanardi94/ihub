<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemTransaction */

$this->title = $model->trx_no;
$this->params['breadcrumbs'][] = ['label' => 'Item Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->trx_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->trx_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'trx_no',
            'category',
            'type',
            'item_name',
            'qty',
            'request_date',
            'pickup_date',
            'return_date',
            'description:ntext',
            'pic_request',
            'pic_approval',
            'status',
        ],
    ]) ?>

</div>
