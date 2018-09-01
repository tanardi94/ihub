<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

use app\models\TblAdditional\TblChurch;
use app\models\TblAdditional\TblGroup;
use app\models\IhubIbadah\IhubIbadah;

/* @var $this yii\web\View */
/* @var $model app\models\TblSchedule\TblSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdGereja')->dropDownList(ArrayHelper::map(TblChurch::find()->all(),'IdGeraja','NamaGereja'),['prompt'=>'Select Church',]); ?>

    <?= $form->field($model, 'ibadah')->dropDownList(ArrayHelper::map(IhubIbadah::find()->where(['weekly' => 1])->all(),'ibadah','namaibadah'),['prompt'=>'Select Service',]); ?>

    <?= $form->field($model, 'tgl')->widget(
                DatePicker::className(), [
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
            ]); ?>

    <?= $form->field($model, 'IdGroup')->dropDownList(ArrayHelper::map(TblGroup::find()->where(['IdDivisi' => 1])->all(),'IdGroup','NamaGroup'),['prompt'=>'Select Team',]); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
