<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IhubOpr\IhubOpr */

$this->title = $model->IdOpr;
$this->params['breadcrumbs'][] = ['label' => 'Ihub Oprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-opr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdOpr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdOpr], [
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
            'IdOpr',
            'Kode',
            'Nama',
            'Email:email',
            'IdGroup',
            'SPV',
            'TglLahir',
            'Posisi',
            'password',
            'comment_ontime',
            'comment_latetime',
            'creation_date',
            'created_by',
            'last_update_date',
            'last_updated_by',
            'status',
        ],
    ]) ?>

</div>
