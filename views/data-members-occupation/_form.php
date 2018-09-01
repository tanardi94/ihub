<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersOccupation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-occupation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'education')->dropDownList(['TK' => 'TK', 'SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA', 'D1' => 'D1', 'D2' => 'D2', 'D3' => 'D3', 'D4' => 'D4', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3' ]); ?>

    <?= $form->field($model, 'education_major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carrer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_fields')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skill')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selanjutnya', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
