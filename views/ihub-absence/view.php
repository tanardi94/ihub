<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IhubAbsence\IhubAbsence */

$this->title = $model->idOpr;
$this->params['breadcrumbs'][] = ['label' => 'Ihub Absences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-absence-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idOpr' => $model->idOpr, 'tglabsence' => $model->tglabsence, 'ibadah' => $model->ibadah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idOpr' => $model->idOpr, 'tglabsence' => $model->tglabsence, 'ibadah' => $model->ibadah], [
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
            'idOpr',
            'tglabsence',
            'ibadah',
            'keterangan',
            'creation_date',
            'created_by',
            'last_update_date',
            'last_updated_by',
            'status',
            'IdGroup',
            'waktumasuk',
            'waktukeluar',
        ],
    ]) ?>

</div>
