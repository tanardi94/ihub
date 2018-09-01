<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemTransaction */

$this->title = 'Create Item Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Item Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-transaction-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
