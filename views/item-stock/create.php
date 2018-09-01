<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemStock */

$this->title = 'Create Item Stock';
$this->params['breadcrumbs'][] = ['label' => 'Item Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-stock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
