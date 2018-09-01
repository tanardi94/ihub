<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersFamily */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-family-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'relationship')->dropDownList(['Single' => 'Single', 'Menikah' => 'Menikah']); ?>

    <?= $form->field($model, 'no_of_siblings')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'spouse_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouse_profession')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dom')->widget(
    DatePicker::className(), [
        // inline too, not bad
         // 'inline' => true, 
         // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'defaultDate' => '1900-01-01'
        ]
    ]);?>

    <?= $form->field($model, 'no_of_children')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selanjutnya', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
