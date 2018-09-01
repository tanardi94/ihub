<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IhubAbsence\IhubAbsence */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$this->registerJs(
   '$("document").ready(function(){ 
		$("#new_ihubabsence").on("pjax:end", function() {
			$.pjax.reload({container:"#ihub_absence"});  //Reload GridView
		});
    });'
);
?>

<div class="ihub-absence-form">

   <?php yii\widgets\Pjax::begin(['id' => 'new_ihubabsence']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idOpr')->textInput() ?>

    <?= $form->field($model, 'tglabsence')->textInput() ?>

    <?= $form->field($model, 'ibadah')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creation_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'last_update_date')->textInput() ?>

    <?= $form->field($model, 'last_updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'IdGroup')->textInput() ?>

    <?= $form->field($model, 'waktumasuk')->textInput() ?>

    <?= $form->field($model, 'waktukeluar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
</div>
