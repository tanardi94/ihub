<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */

$this->title = 'Create Data Members';
$this->params['breadcrumbs'][] = ['label' => 'Data Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-members-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
