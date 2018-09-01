<?php

namespace app\models;

use Yii;
use app\models\IhubAbsence\IhubAbsence;
use app\models\IhubAbsence\IhubAbsenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReportController implements the CRUD actions for IhubAbsence model.
 */
class ReportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IhubAbsence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IhubAbsenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IhubAbsence model.
     * @param integer $idOpr
     * @param string $tglabsence
     * @param integer $ibadah
     * @return mixed
     */
    public function actionView($idOpr, $tglabsence, $ibadah)
    {
        return $this->render('view', [
            'model' => $this->findModel($idOpr, $tglabsence, $ibadah),
        ]);
    }

    /**
     * Creates a new IhubAbsence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IhubAbsence();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idOpr' => $model->idOpr, 'tglabsence' => $model->tglabsence, 'ibadah' => $model->ibadah]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IhubAbsence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idOpr
     * @param string $tglabsence
     * @param integer $ibadah
     * @return mixed
     */
    public function actionUpdate($idOpr, $tglabsence, $ibadah)
    {
        $model = $this->findModel($idOpr, $tglabsence, $ibadah);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idOpr' => $model->idOpr, 'tglabsence' => $model->tglabsence, 'ibadah' => $model->ibadah]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IhubAbsence model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idOpr
     * @param string $tglabsence
     * @param integer $ibadah
     * @return mixed
     */
    public function actionDelete($idOpr, $tglabsence, $ibadah)
    {
        $this->findModel($idOpr, $tglabsence, $ibadah)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IhubAbsence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idOpr
     * @param string $tglabsence
     * @param integer $ibadah
     * @return IhubAbsence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idOpr, $tglabsence, $ibadah)
    {
        if (($model = IhubAbsence::findOne(['idOpr' => $idOpr, 'tglabsence' => $tglabsence, 'ibadah' => $ibadah])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
