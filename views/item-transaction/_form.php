<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\switchinput\SwitchBox;
use dosamigos\datepicker\DatePicker;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/* @var $model app\models\ItemTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-transaction-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'request_date')->widget(
                DatePicker::className(), [
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
            ]);?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'pic_request')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    
    <?= $form->field($model, 'items')->widget(MultipleInput::classname(),[
        'max' => 10,
        'columns' => [
            [
                'name'          => 'category',
                'type'          => 'dropDownList',
                'title'         => 'Category',
                'defaultValue'  => 1,
                'items' => [
                    1 => 'Office Station', 
                    2 => 'Non Office Station'
                ]

            ],
            [
                'name'          => 'type',
                'type'          => 'dropDownList',
                'title'         => 'Type',
                'defaultValue'  => 1,
                'items' => [
                    1 => 'Office ', 
                    2 => 'Non Office'
                ]
            ],
            [
                'name'          => 'item_name',
                'type'          => 'dropDownList',
                'title'         => 'Item Name',
                'defaultValue'  => 1,
                'items' => [
                    1 => '1 Station', 
                    2 => '2 Station'
                ]
            ],
            [
                'name'          => 'qty',
                'title'         => 'Quantity',
                'enableError'   => true,
                'options'       => ['class' => 'input-qty']
            ],
        
        ]
    ]);
    ?>
    
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
