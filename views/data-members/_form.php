<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DateRangePicker;
// use yii\jui\DatePicker;
use dosamigos\datepicker\DatePicker;

use app\models\DataMembers\DataMembers;
use app\models\DataMembers\DataMembersChurch;
use app\models\DataMembers\DataMembersContacts;
use app\models\DataMembers\DataMembersFamily;
use app\models\DataMembers\DataMembersOccupation;
use app\models\DataMembers\DataMembersMinistry;


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model,'dob')->widget(yii\jui\DatePicker::className(),['clientOptions' => ['dateFormat' => 'yyyy-mm-dd', 'defaultDate' => '2014-01-01']])->textInput(['placeholder' => 'Class Date']); ?>
 -->
    <?= $form->field($model, 'dob')->widget(
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

    <?php echo $form->field($model, 'gender')->dropDownList(['0' => 'Pria', '1' => 'Wanita']); ?>


    <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cloth_size')->dropDownList(['XS' => 'XS', 'S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL', 'XXXL' => 'XXXL' ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selanjutnya', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
