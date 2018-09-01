<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblSchedule\TblSchedule */

$this->title = 'Create Schedule';
?>
<div class="tbl-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
