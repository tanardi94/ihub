<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSchedule\TblSchedule */

$this->title = 'Update Tbl Schedule: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
