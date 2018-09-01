<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IhubOpr\IhubOpr */

$this->title = 'Create Ihub Opr';
$this->params['breadcrumbs'][] = ['label' => 'Ihub Oprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ihub-opr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
