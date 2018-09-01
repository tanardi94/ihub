<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use kartik\growl\Growl;
use app\assets\AppAsset;
//use app\assets\AbsenceAsset;
//
//AbsenceAsset::register($this);
//AppAsset::register($this);


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */


$this->title = "Welcome Home ";
if(Yii::$app->session->getFlash('success', null, true)) {
            echo Growl::widget([
                'type' => Growl::TYPE_SUCCESS,
                'title' => 'Anda sudah berhasil Absen!',
                'icon' => 'glyphicon glyphicon-thumbs-up',
                'body' => 'Happy Serving '.Html::tag('i', '', ['class' => 'em em-angel']),
                'showSeparator' => true,
                'delay' => 0.5,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'center',
                    ]
                ]
            ]);
    }

// $this->params['breadcrumbs'][] = ['label' => 'Data Members', 'url' => ['data-members/view1']];
?>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 20%;
    }
</style>
<div class="container">
    <div class="row">
        <h1 style="text-align: center;"><?= Html::encode($this->title) ?><br><?= $nama->Nama." " ?><i class='em em-hugging_face'></i></h1>
    <div class="form-group text-center">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'ibadah')->dropDownList(
        $avail, ['prompt'=>'Choose your service', 
            'options' => ['style' => 'color: #4de4df; font-size: 20px; width:200px;']])->label('<h3 style="text-align: center;">Which service are you in?</h3>'); ?>
    <?= $form->field($model, 'waktumasuk')->hiddenInput()->label(false) ?>
        <?= Html::submitButton('Check In' , ['class' => 'btn btn-primary btn-lg']) ?>
    <?php ActiveForm::end(); ?>
            <img src="./images/mslogo.jpg" alt="" class="center">

    </div>
    </div>
</div>
