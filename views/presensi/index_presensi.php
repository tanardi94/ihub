<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Presensi\IhubAbsence */
/* @var $form ActiveForm */
?>
<div class="presensi-index_presensi">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'idOpr') ?>
        <?= $form->field($model, 'tglabsence') ?>
        <?= $form->field($model, 'ibadah') ?>
        <?= $form->field($model, 'IdGroup') ?>
        <?= $form->field($model, 'keterangan') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- presensi-index_presensi -->
