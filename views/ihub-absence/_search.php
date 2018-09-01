<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IhubAbsence\IhubAbsenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ihub-absence-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idOpr') ?>

    <?= $form->field($model, 'tglabsence') ?>

    <?= $form->field($model, 'ibadah') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'last_update_date') ?>

    <?php // echo $form->field($model, 'last_updated_by') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'IdGroup') ?>

    <?php // echo $form->field($model, 'waktumasuk') ?>

    <?php // echo $form->field($model, 'waktukeluar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
