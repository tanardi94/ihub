<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\assets\AbsenceAsset;

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
</style>
<div class="container">
    <div class="row">
       <?php
        if($info > 0)
        {
            echo '<h1 style="text-align: center; color:red;">'.date("H:i:s", strtotime($model->waktumasuk)).
               "</h1><br><h1 style='text-align: center;'>You are <span style='text-align: center; color:red;'>not on time</span> ".Html::tag('i', '', ['class' => "em em-frowning"]).'</h1>'.$comm;
        }
        else  
        {
            echo '<h1 style="text-align: center; color:blue;">'.date("H:i:s", strtotime($model->waktumasuk)).
               "</h1><h1 style='text-align: center;'>You are <span style='text-align: center; color:blue;'>on time</span> ".Html::tag('i', '', ['class' => 'em em-smile']).
                '</h1>'.$comm;
        }
        ?>
    <div class="col-md-12 text-center">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'waktukeluar')->hiddenInput()->label(false) ?>
        <?= Html::submitButton('Check Out ' , ['class' => 'btn btn-danger btn-lg']) ?>
    <?php ActiveForm::end(); ?>
    </div>
    <img src="./images/mslogo.jpg" alt="" class="center" />
    </div>
</div>
