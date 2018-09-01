<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
//use app\assets\AbsenceAsset;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */

//AbsenceAsset::register($this);

// $this->params['breadcrumbs'][] = ['label' => 'Data Members', 'url' => ['data-members/view1']];
?>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 15%;
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
       <?php
        if($info > 0)
        {
            echo '<h1 style="text-align: center; font-family: digital-7; font-size: 36pt; color:#de2920;">'.date("H:i:s", strtotime($model->waktumasuk)).
               "<br><h1 style='text-align: center; font-family: digital-7; font-size: 21pt; '>You are <span style='text-align: center; color:#de2920;'>not on time</span></h1><p style='font-family:Ubuntu-R; font-size: 18pt;'".$comm."</p>";
        }
        else  
        {
            echo '<h1 style="text-align: center; font-family: digital-7; color:#7fe0f8;">'.date("H:i:s", strtotime($model->waktumasuk)).
               "<br><h1 style='text-align: center; font-family: digital-7; font-size: 21pt; '>You are <span style='text-align: center; color:#7fe0f8;'>on time</span></h1><p style='font-family:Ubuntu-R; font-size: 18pt;'".$comm."</p>";
        }
        ?>
    <div class="col-md-12 text-center">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'waktukeluar')->hiddenInput()->label(false) ?>
        <?= Html::submitButton('Check Out ' , ['class' => 'button_checkout']) ?>
    <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
