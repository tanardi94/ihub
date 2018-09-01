<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\DataMembers\DataMembers;


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iconnect_presence')->dropDownList(['0' => '-', '1' => 'Tidak Hadir', '2' => 'Hadir',]); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selanjutnya', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
