<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\DataMembers\DataMembersChurch */

$this->title = 'Rekomitmen Tahap 5';
?>
<div class="data-members-church-update">

    <ul class="nav nav-pills">
	  <li><a href="<?= Url::to(['data-members/update1']) ?>">Data Pribadi</a></li>
	  <li><a href="<?= Url::to(['data-members-contacts/update1']) ?>">Kontak</a></li>
	  <li><a href="<?= Url::to(['data-members-family/update1']) ?>">Keluarga</a></li>
	  <li><a href="<?= Url::to(['data-members-occupation/update1']) ?>">Profesi</a></li>
	  <li class="active"><a href="#">Komunitas</a></li>
	</ul>
	<br /><br />

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
