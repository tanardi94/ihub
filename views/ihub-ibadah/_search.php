<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IhubIbadah\IhubIbadahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ihub-ibadah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ibadah') ?>

    <?= $form->field($model, 'namaibadah') ?>

    <?= $form->field($model, 'awal') ?>

    <?= $form->field($model, 'selesai') ?>

    <?= $form->field($model, 'jamawalibadah') ?>

    <?php // echo $form->field($model, 'jamakhiribadah') ?>

    <?php // echo $form->field($model, 'batasjampulang') ?>

    <?php // echo $form->field($model, 'batasjamterlambat') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'weekly') ?>

    <?php // echo $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'last_update_date') ?>

    <?php // echo $form->field($model, 'last_updated_by') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'IdGereja') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
