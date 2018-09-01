<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Data Members', 'url' => ['data-members/view1']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>        
        <?= Html::a('Rekomitmen', ['recommitment'], ['class' => 'btn btn-primary']) ?>        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nij',
            'fullname',
            'nickname',
            'dob',
            'gender',
            'birthplace',
            'cloth_size',
            'nij0.gms_origin',
            'nij0.gms_service',
            'nij0.baptism_water',
            'nij0.baptism_holyspirit',
            'nij0.cg_code',
            'nij0.cg_cgl_fullname',
            'nij0.cg_cgl_phone',
            'nij0.cg_position',
            'nij0.cg_cgl_coach',
            'nij1.address_1',
            'nij1.address_2',
            'nij1.phone',
            'nij1.email',
            'nij1.line',
            'nij1.ig',

        ],
    ]) ?>

</div>
