<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ErformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="erform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'etype') ?>

    <?= $form->field($model, 'ename') ?>

    <?= $form->field($model, 'evenue') ?>

    <?= $form->field($model, 'est_attd') ?>

    <?php // echo $form->field($model, 'e_startdate') ?>

    <?php // echo $form->field($model, 'e_enddate') ?>

    <?php // echo $form->field($model, 'e_weekly') ?>

    <?php // echo $form->field($model, 'pic_name') ?>

    <?php // echo $form->field($model, 'pic_phone') ?>

    <?php // echo $form->field($model, 'pic_email') ?>

    <?php // echo $form->field($model, 'pic_ministry') ?>

    <?php // echo $form->field($model, 'service_req') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
