<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemTransaction */

$this->title = 'Update Item Transaction: ' . $model->trx_no;
$this->params['breadcrumbs'][] = ['label' => 'Item Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trx_no, 'url' => ['view', 'id' => $model->trx_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
