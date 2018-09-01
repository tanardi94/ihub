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
    body {
        background-image: url('absence-style/IHUB web BG-01.jpg');
        background-size: cover;
    }
    @font-face {
      font-family: 'nidsans-webfont';
      src: url('absence-style/nidsans-webfont.ttf') format('truetype');
    }
    @font-face {
      font-family: 'Ubuntu-R';
      src: url('absence-style/Ubuntu-R.ttf') format('truetype');
    }
    @font-face {
      font-family: 'digital-7';
      src: url('absence-style/digital-7.ttf') format('truetype');
    }
</style>
<div class="container">
    <div class="row">
       <img src="./absence-style/Logo GMS.png" alt="" class="center">
        <h1 style="text-align: center; font-family: nidsans-webfont; font-size: 30pt;"><?= Html::encode($this->title)." " ?><?= $nama->Nama." " ?></h1>
    <div class="form-group text-center">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'ibadah')->dropDownList(
        $avail, ['prompt'=>'Choose your service', 
            'options' => ['style' => 'font-family: Ubuntu-R; font-size: 18pt; width:100px;']])->label('<h4 style="text-align: center; font-family: Ubuntu-R; font-size: 21pt;">Which service are you in?</h3>'); ?>
    <?= $form->field($model, 'waktumasuk')->hiddenInput()->label(false) ?>
        <?= Html::submitButton('Check In' , ['class' => 'button_example']) ?>
    <?php ActiveForm::end(); ?>

    </div>
    </div>
</div>
