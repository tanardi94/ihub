<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

use app\models\TblAdditional\TblChurch;
use app\models\TblAdditional\TblGroup;
use app\models\TblAdditional\TblSpeaker;

use app\models\IhubIbadah\IhubIbadah;

/* @var $this yii\web\View */
/* @var $model app\models\Iwreport */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .row h4 {
        text-align: center;
        text-decoration-line: underline;
        font-weight: bold;
    }
</style>

<div class="iwreport-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="container">
            <h3>1.Service Data</h3>
            <div class="row">
                
                <div class="col-lg-4"><?= $form->field($model, 'venue_id')->dropDownList(ArrayHelper::map(TblChurch::find()->all(),'IdGeraja','NamaGereja'),['prompt'=>'Select Church',]); ?></div>

                <div class="col-lg-4"><?= $form->field($model, 'speaker_id')->dropDownList(ArrayHelper::map(TblSpeaker::find()->all(),'speaker_id','speakername'),['prompt'=>'Select Speaker Name',]); ?></div>
                
                <div class="col-lg-4"><?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(IhubIbadah::find()->where(['weekly' => 1])->all(),'ibadah','namaibadah'),['prompt'=>'Select Service',]); ?></div>
            
            </div>
            
            <div class="row">

            <div class="col-lg-4"><?= $form->field($model, 'date_id')->widget(
                DatePicker::className(), [
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
            ]);?> 
            </div>
                <div class="col-lg-4"><?= $form->field($model, 'team')->dropDownList(ArrayHelper::map(TblGroup::find()->where(['IdDivisi' => 1])->all(),'IdGroup','NamaGroup'),['prompt'=>'Select Team',]); ?></div>
            
            </div>
            
            <hr>

            <h3>2.Iclick Data</h3>
            <div class="row">
                <h4>Presence</h4>
                <div class="col-lg-4 col-xs-4"><?= $form->field($model, 'male')->textInput() ?></div>

                <div class="col-lg-4 col-xs-4"><?= $form->field($model, 'female')->textInput() ?></div>

                <div class="col-lg-4 col-xs-4"><?= $form->field($model, 'empty')->textInput() ?></div>
            
            </div>

                <h4>Volunteers</h4>
            <span class="row">
                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'usher')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'spro')->textInput() ?></div>
            
            </span>
            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'paw')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'multimedia')->textInput() ?></div>

            </span>

            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'interpreter')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'prayer')->textInput() ?></div>
            
            </span>
            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'ihub')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'photography')->textInput() ?></div>

            </span>

            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'welcomer')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'creamy')->textInput() ?></div>
            
            </span>
            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'hospitality')->textInput() ?></div>

            </span>

            <span class="row">
                <h4>Streaming Data</h4>
                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'mstv')->textInput() ?></div>
                
                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'mstv_en')->textInput() ?></div>
            
            </span>
            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'mstv_cn')->textInput() ?></div>

            </span>

            <span class="row">
                <h4>Additional Data</h4>
                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'altarcall')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'altarcall2')->textInput() ?></div>
            
            </span>
            <span class="row">

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'bmale')->textInput() ?></div>

                <div class="col-lg-6 col-xs-6"><?= $form->field($model, 'bfemale')->textInput() ?></div>

            </span>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
