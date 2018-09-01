<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersFamily */

$this->title = 'Rekomitmen Tahap 3';
?>
<div class="data-members-family-update">

    <ul class="nav nav-pills">
	  <li><a href="<?= Url::to(['data-members/update1']) ?>">Data Pribadi</a></li>
	  <li><a href="<?= Url::to(['data-members-contacts/update1']) ?>">Kontak</a></li>
	  <li class="active"><a href="#">Keluarga</a></li>
	</ul>
	<br /><br />
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
