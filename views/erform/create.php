<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Erform */

$this->title = 'iRequest Form';
?>
<div class="erform-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
