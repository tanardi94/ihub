<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IhubOpr\IhubOpr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ihub-opr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdOpr')->textInput() ?>

    <?= $form->field($model, 'Kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdGroup')->textInput() ?>

    <?= $form->field($model, 'SPV')->textInput() ?>

    <?= $form->field($model, 'TglLahir')->textInput() ?>

    <?= $form->field($model, 'Posisi')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_ontime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_latetime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creation_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'last_update_date')->textInput() ?>

    <?= $form->field($model, 'last_updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
