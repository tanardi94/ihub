<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersMinistry */
/* @var $form ActiveForm */
?>
<div class="site-presensi">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nij') ?>
        <?= $form->field($model, 'ministry_year') ?>
        <?= $form->field($model, 'team') ?>
        <?= $form->field($model, 'position') ?>
        <?= $form->field($model, 'status') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-presensi -->
