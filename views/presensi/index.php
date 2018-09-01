<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Presensi\IhubOpr */
/* @var $form ActiveForm */
?>
<div class="presensi-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'IdOpr') ?>
        <?= $form->field($model, 'IdGroup') ?>
        <?= $form->field($model, 'SPV') ?>
        <?= $form->field($model, 'Posisi') ?>
        <?= $form->field($model, 'Kode') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'Nama') ?>
        <?= $form->field($model, 'Email') ?>
        <?= $form->field($model, 'comment_ontime') ?>
        <?= $form->field($model, 'comment_latetime') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- presensi-index -->
