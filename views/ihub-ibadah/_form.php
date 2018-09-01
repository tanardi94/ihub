<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IhubIbadah\IhubIbadah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ihub-ibadah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ibadah')->textInput() ?>

    <?= $form->field($model, 'namaibadah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'awal')->textInput() ?>

    <?= $form->field($model, 'selesai')->textInput() ?>

    <?= $form->field($model, 'jamawalibadah')->textInput() ?>

    <?= $form->field($model, 'jamakhiribadah')->textInput() ?>

    <?= $form->field($model, 'batasjampulang')->textInput() ?>

    <?= $form->field($model, 'batasjamterlambat')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weekly')->textInput() ?>

    <?= $form->field($model, 'creation_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'last_update_date')->textInput() ?>

    <?= $form->field($model, 'last_updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'IdGereja')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
