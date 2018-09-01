<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Erform */

$this->title = $model->ename;
?>
<div class="erform-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'etype',
            'ename',
            'evenue',
            'est_attd',
            'e_startdate',
            'e_enddate',
            'e_weekly',
            'pic_name',
            'pic_phone',
            'pic_email:email',
            'pic_ministry',
            'service_req',
            'notes',
            'status',
            'timestamp',
        ],
    ]) ?>

</div>
