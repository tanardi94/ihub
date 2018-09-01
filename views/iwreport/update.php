<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Iwreport */

$this->title = 'Update Iwreport: ' . $model->id;
?>
<div class="iwreport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
