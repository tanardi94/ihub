<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Iwreport */

$this->title = $model->id;
?>
<div class="iwreport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'venue_id' => $model->venue_id, 'speaker_id' => $model->speaker_id, 'service_id' => $model->service_id, 'team' => $model->team], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'venue_id' => $model->venue_id, 'speaker_id' => $model->speaker_id, 'service_id' => $model->service_id, 'team' => $model->team], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'venue_id',
            'speaker_id',
            'service_id',
            'date_id',
            'team',
            'male',
            'female',
            'empty',
            'usher',
            'spro',
            'paw',
            'multimedia',
            'interpreter',
            'prayer',
            'ihub',
            'photography',
            'welcomer',
            'creamy',
            'hospitality',
            'altarcall',
            'altarcall2',
            'bmale',
            'bfemale',
            'mstv',
            'mstv_en',
            'mstv_cn',
            //'timestamp',
        ],
    ]) ?>

</div>
