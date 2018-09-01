<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IwreportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="iwreport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'venue_id') ?>

    <?= $form->field($model, 'speaker_id') ?>

    <?= $form->field($model, 'service_id') ?>

    <?= $form->field($model, 'date_id') ?>

    <?php // echo $form->field($model, 'team') ?>

    <?php // echo $form->field($model, 'male') ?>

    <?php // echo $form->field($model, 'female') ?>

    <?php // echo $form->field($model, 'empty') ?>

    <?php // echo $form->field($model, 'usher') ?>

    <?php // echo $form->field($model, 'spro') ?>

    <?php // echo $form->field($model, 'paw') ?>

    <?php // echo $form->field($model, 'multimedia') ?>

    <?php // echo $form->field($model, 'interpreter') ?>

    <?php // echo $form->field($model, 'prayer') ?>

    <?php // echo $form->field($model, 'ihub') ?>

    <?php // echo $form->field($model, 'photography') ?>

    <?php // echo $form->field($model, 'welcomer') ?>

    <?php // echo $form->field($model, 'creamy') ?>

    <?php // echo $form->field($model, 'hospitality') ?>

    <?php // echo $form->field($model, 'altarcall') ?>

    <?php // echo $form->field($model, 'altarcall2') ?>

    <?php // echo $form->field($model, 'bmale') ?>

    <?php // echo $form->field($model, 'bfemale') ?>

    <?php // echo $form->field($model, 'mstv') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
