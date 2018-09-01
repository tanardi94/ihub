<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IhubIbadah\IhubIbadah */

$this->title = $model->ibadah;
$this->params['breadcrumbs'][] = ['label' => 'Ihub Ibadahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-ibadah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ibadah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ibadah], [
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
            'ibadah',
            'namaibadah',
            'awal',
            'selesai',
            'jamawalibadah',
            'jamakhiribadah',
            'batasjampulang',
            'batasjamterlambat',
            'keterangan',
            'weekly',
            'creation_date',
            'created_by',
            'last_update_date',
            'last_updated_by',
            'status',
            'IdGereja',
        ],
    ]) ?>

</div>
