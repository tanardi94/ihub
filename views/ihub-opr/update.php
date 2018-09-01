<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IhubOpr\IhubOpr */

$this->title = 'Update Ihub Opr: ' . $model->IdOpr;
$this->params['breadcrumbs'][] = ['label' => 'Ihub Oprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdOpr, 'url' => ['view', 'id' => $model->IdOpr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ihub-opr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
