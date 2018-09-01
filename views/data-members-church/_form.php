<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersChurch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-members-church-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'gms_origin')->textInput() ?> -->
    <?php $model->gms_origin = 1; ?>

    <?php echo $form->field($model, 'gms_service')->dropDownList(
        [ 
        'UMUM 1' => 'UMUM 1',
        'UMUM 2' => 'UMUM 2',
        'UMUM 3' => 'UMUM 3',
        'UMUM 4' => 'UMUM 4',
        'PRO M' => 'PRO M',
        'AOG Pemuda' => 'AOG Youth',
        'AOG Pelajar' => 'AOG Teen',
        'Eaglekidz Sabtu' => 'Eaglekidz Sabtu',
        'Eaglekidz Minggu' => 'Eaglekidz Minggu',
        'GMS HOV' => 'GMS HOV (Siwalankerto)',
        'GMS Revelation' => 'GMS Revelation (Sukomanunggal)',
        'GMS Unity' => 'GMS Unity (Marvel City)',
        ]); ?>

    <?php echo $form->field($model, 'baptism_water')->dropDownList(['0' => 'Belum', '1' => 'Sudah']); ?>

    <?php echo $form->field($model, 'baptism_holyspirit')->dropDownList(['0' => 'Belum', '1' => 'Sudah']); ?>

    <?= $form->field($model, 'cg_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cg_cgl_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cg_cgl_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cg_position')->dropDownList(['Simpatisan' => 'New Friend', 'Member' => 'Member', 'Sponsor' => 'Sponsor', 'CG Leader' => 'CG Leader', 'Coach' => 'Coach', 'Team Leader' => 'Team Leader']); ?>

    <?= $form->field($model, 'cg_cgl_coach')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan dan Selanjutnya', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

