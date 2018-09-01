<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IhubOpr\IhubOprSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ihub-opr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdOpr') ?>

    <?= $form->field($model, 'Kode') ?>

    <?= $form->field($model, 'Nama') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'IdGroup') ?>

    <?php // echo $form->field($model, 'SPV') ?>

    <?php // echo $form->field($model, 'TglLahir') ?>

    <?php // echo $form->field($model, 'Posisi') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'comment_ontime') ?>

    <?php // echo $form->field($model, 'comment_latetime') ?>

    <?php // echo $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'last_update_date') ?>

    <?php // echo $form->field($model, 'last_updated_by') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
