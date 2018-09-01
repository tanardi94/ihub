<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchBox;
use dosamigos\datepicker\DateRangePicker;


use app\models\TblAdditional\TblDivision;
use app\models\TblAdditional\TblChurch;
use app\models\TblAdditional\TblMinistry;

/* @var $this yii\web\View */
/* @var $model app\models\Erform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="erform-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <?= Html::img('@web/Logo.png') ?>
    
        <h3>1.Event Data</h3>
        <div class="row">

            <div class="col-lg-3"><?= $form->field($model, 'etype')->dropdownList([
                    1 => 'HEALING CRUSADE', 
                    2 => 'NON HEALING CRUSADE',
                    3 => 'POP UP',
                    4 => 'WEEKLY EVENT'
                    ],
                    ['prompt'=>'Select Category']
                ); ?>
                    
            </div>
            <div class="col-lg-3"><?= $form->field($model, 'evenue')->dropDownList(ArrayHelper::map(TblChurch::find()->all(),'IdGeraja','NamaGereja'),['prompt'=>'Select Church',]); ?></div>
            <div class="col-lg-3"><?= $form->field($model, 'ename')->textInput(['maxlength' => true,'placeholder' => 'eg. Festival Kuasa Allah']) ?></div>
            <div class="col-lg-3"><?= $form->field($model, 'est_attd')->textInput(['maxlength' => true,'placeholder' => 'eg. 5000']) ?></div>
        </div>
        
        <div class="row">
            <div class="col-lg-3"><?= $form->field($model, 'e_startdate')->widget(DateRangePicker::className(), [
                    'attributeTo' => 'e_enddate', 
                    'form' => $form, // best for correct client validation
                    'language' => 'en',
                    'size' => 'xs',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);?>
            </div>
            <div class="col-lg-3"><?= $form->field($model, 'e_weekly')->widget(SwitchBox::className(),[
                'clientOptions' => [
                    'size' => 'large',
                    'onColor' => 'success',
                    'offColor' => 'primary',
                    'onText' => 'Yes',
                    'offText' => 'No',
                    ],
                ]); ?>
            </div>
            <div class="col-lg-3"><?= $form->field($model, 'service_req')->checkBoxList(ArrayHelper::map(TblDivision::find()->all(),'NamaDivisi','NamaDivisi')) ?></div>
        </div>
        
        <hr>
        
        <h3>2.Your Data</h3>
        <div class="row">
            <div class="col-lg-3"><?= $form->field($model, 'pic_name')->textInput(['maxlength' => true]) ?></div>
            <div class="col-lg-3"><?= $form->field($model, 'pic_phone')->textInput() ?></div>
            <div class="col-lg-3"><?= $form->field($model, 'pic_email')->textInput(['email']) ?></div>
            <div class="col-lg-3"><?= $form->field($model, 'pic_ministry')->dropDownList(ArrayHelper::map(TblMinistry::find()->all(),'IdMinistry','NamaMinistry'),['prompt'=>'Select Your Ministry',]) ?></div>     
        </div>
        
        <?= $form->field($model, 'notes')->textarea(['rows' => 6,'placeholder' => 'Fill Your Request']) ?>
        
        

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Request Us!' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    
    </div>
    <?php ActiveForm::end(); ?>

</div>
