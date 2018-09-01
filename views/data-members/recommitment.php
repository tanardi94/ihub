<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */

$this->title = "Rekomitmen " . $model->nickname;
$this->params['breadcrumbs'][] = ['label' => 'Data Members', 'url' => ['data-members/view1']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'recommitment_start')->hiddenInput()->label(false) ?>
    <p>
        Saya <b><?= $model->fullname ?></b> menyatakan komitmen ulang saya untuk tetap melayani sebagai volunteer di IHUB Ministry.
    </p>
    <p>
        Saya siap mengemban <a href="https://ihub.mygms.com/basic/web/index.php?r=site%2Fabout">visi dan misi</a> dari IHUB sebagai value dari pelayanan saya.
    </p>
    <p>
        Dengan memperbaharui data pribadi saya disini, saya menyatakan rekomitmen saya sebagai volunteer Gereja Mawar Sharon di bagian IHUB.
    </p>
    <div class="form-group">
        <?= Html::submitButton('Saya Mau Berkomitmen Ulang ' , ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

    

</div>
