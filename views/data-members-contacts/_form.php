<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersContacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?>

    <?php if(empty($model->ig)){ $model->ig = "@"; } ?>
    <?= $form->field($model, 'ig')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selanjutnya', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
