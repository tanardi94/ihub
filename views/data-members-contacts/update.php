<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersContacts */

$this->title = 'Rekomitmen Tahap 2';
?>
<div class="data-members-contacts-update">

    <ul class="nav nav-pills">
	  <li><a href="<?= Url::to(['data-members/update1']) ?>">Data Pribadi</a></li>
	  <li class="active"><a href="#">Kontak</a></li>
	</ul>
	<br /><br />
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
