<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IhubAbsence\IhubAbsence */

$this->title = 'Create Ihub Absence';
$this->params['breadcrumbs'][] = ['label' => 'Ihub Absences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-absence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
