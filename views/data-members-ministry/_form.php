<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersMinistry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-ministry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ministry_year')->widget(
    DatePicker::className(), [
        // inline too, not bad
         // 'inline' => true, 
         // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy',
            'defaultDate' => '1900-01-01'
        ]
    ]);?>

    <?= $form->field($model, 'team')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selesai', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
