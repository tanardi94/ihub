<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IhubAbsence\IhubAbsence */

$this->title = 'Update Ihub Absence: ' . $model->idOpr;
//$this->params['breadcrumbs'][] = ['label' => 'Ihub Absences', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idOpr, 'url' => ['view', 'idOpr' => $model->idOpr, 'tglabsence' => $model->tglabsence, 'ibadah' => $model->ibadah]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ihub-absence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
