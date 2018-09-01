<?php

namespace app\controllers;

class PresensiController extends \yii\web\Controller
{
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    public function actionIndex()
	{
	    $model = new app\models\Presensi\IhubOpr();
	    if ($model->load(Yii::$app->request->post())) {
	        if ($model->validate()) {
	            // form inputs are valid, do something here
	            return;
	        }
	    }

	    return $this->render('index', [
	        'model' => $model,
	    ]);
	}

	public function actionIndex_presensi()
	{
	    $model = new app\models\Presensi\IhubAbsence();

	    if ($model->load(Yii::$app->request->post())) {
	        if ($model->validate()) {
	            // form inputs are valid, do something here
	            return;
	        }
	    }

	    return $this->render('index_presensi', [
	        'model' => $model,
	    ]);
	}

}
