<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IhubIbadah\IhubIbadah */

$this->title = 'Update Ihub Ibadah: ' . $model->ibadah;
$this->params['breadcrumbs'][] = ['label' => 'Ihub Ibadahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ibadah, 'url' => ['view', 'id' => $model->ibadah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ihub-ibadah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
