<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\DataMembers */

$this->title = 'Rekomitmen Tahap 1';
?>
<div class="data-members-update">

    <ul class="nav nav-pills">
	  <li class="active"><a href="#">Data Pribadi</a></li>
	</ul>
	<br /><br />
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
