<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IhubIbadah\IhubIbadah */

$this->title = 'Create Ihub Ibadah';
$this->params['breadcrumbs'][] = ['label' => 'Ihub Ibadahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-ibadah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
