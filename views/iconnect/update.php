<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */

$this->title = 'Ubah Kehadiran Iconnect';
$this->params['breadcrumbs'][] = ['label' => 'E-certificate', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ihub-opr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
