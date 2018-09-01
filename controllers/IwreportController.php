<?php

namespace app\controllers;

use Yii;
use app\models\Iwreport\Iwreport;
use app\models\Iwreport\IwreportSummary;
use app\models\Iwreport\IwreportSearch;
use app\models\TblAdditional\TblChurch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\mpdf\Pdf;

/**
 * IwreportController implements the CRUD actions for Iwreport model.
 */
class IwreportController extends Controller
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
     * Lists all Iwreport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IwreportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Iwreport model.
     * @param integer $id
     * @param integer $venue_id
     * @param integer $speaker_id
     * @param integer $service_id
     * @param integer $team
     * @return mixed
     */
    public function actionView($id, $venue_id, $speaker_id, $service_id, $team)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $venue_id, $speaker_id, $service_id, $team),
        ]);
    }

    /**
     * Creates a new Iwreport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Iwreport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'venue_id' => $model->venue_id, 'speaker_id' => $model->speaker_id, 'service_id' => $model->service_id, 'team' => $model->team]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Iwreport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $venue_id
     * @param integer $speaker_id
     * @param integer $service_id
     * @param integer $team
     * @return mixed
     */
    public function actionUpdate($id, $venue_id, $speaker_id, $service_id, $team)
    {
        $model = $this->findModel($id, $venue_id, $speaker_id, $service_id, $team);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'venue_id' => $model->venue_id, 'speaker_id' => $model->speaker_id, 'service_id' => $model->service_id, 'team' => $model->team]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Iwreport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $venue_id
     * @param integer $speaker_id
     * @param integer $service_id
     * @param integer $team
     * @return mixed
     */
    public function actionDelete($id, $venue_id, $speaker_id, $service_id, $team)
    {
        $this->findModel($id, $venue_id, $speaker_id, $service_id, $team)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Iwreport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $venue_id
     * @param integer $speaker_id
     * @param integer $service_id
     * @param integer $team
     * @return Iwreport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $venue_id, $speaker_id, $service_id, $team)
    {
        if (($model = Iwreport::findOne(['id' => $id, 'venue_id' => $venue_id, 'speaker_id' => $speaker_id, 'service_id' => $service_id, 'team' => $team])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionReport()
    {
        $model = new IwreportSummary();
        if($model->load(Yii::$app->request->post())){           
            $model->generateReport();

            // get your HTML raw content without any layouts or scripts
                $content = $this->renderPartial('report3',['model'=>$model]);
            
                // setup kartik\mpdf\Pdf component
                $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_ASIAN, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                //'cssFile' => '@web/css/table.css',
                // any css to be embedded if required
                //'cssInline' => '.kv-heading-1{font-size:18px}', 
                'cssInline' => '
                    .text-center h3 h5 {
                        font-weight: bold;
                    }
                    .iwreport table td {    
                        border: solid 1px #000 !important;
                        vertical-align: middle !important;

                    }
                    .iwreport table tr {    
                        border: solid 1px #000 !important;
                    }
                    .iwreport table th{
                        background: #d9d9d9;
                        text-align: center;
                        vertical-align: middle !important;
                        border: solid 1px #000 !important;
                    }
                    .iwreport table .row-note{
                        text-transform: uppercase;
                        font-weight: bold;
                        background: #daedf2;
                        font-style: italic;
                    }
                    .cell-jemaat-pria {
                        background: #8db4e0;
                    }
                    .cell-jemaat-pria-total {
                        background: #538dd4;
                        font-weight: bold;
                    }
                    .cell-jemaat-wanita {
                        background: #e6b8b8;
                    }
                    .cell-jemaat-wanita-total {
                        background: #d99593;
                        font-weight: bold;
                    }
                    .iwreport table .col-note {
                        text-transform: uppercase;
                    }
                    .cell-volunteer {
                        background: #fad3b4;
                    }
                    .cell-volunteer-total {
                        background: #ffbf00;
                        font-weight: bold;
                    }
                    .cell-streaming {
                        background: #c4d69c;
                    }
                    .cell-streaming-total {
                        background: #92cf51;
                        font-weight: bold;
                    }
                    .row-note-total-per-item {
                        text-transform: uppercase;
                        font-weight: bold;
                        background: #93cddb;
                        font-style: italic;
                    }
                    .cell-per-jemaat {
                        background: #ccc1d9;
                    }
                    .cell-per-jemaat-total {
                        background: #b1a1c7;
                        font-weight: bold;
                    }
                    .cell-per-volunteer {
                        background: #fad3b4;
                    }
                    .cell-per-volunteer-total {
                        background: #ffbf00;
                        font-weight: bold;
                    }
                    .cell-per-streaming {
                        background: #c4d69c;
                    }
                    .cell-per-streaming-total {
                        background: #92cf51;
                        font-weight: bold;
                    }
                    .col-note-total-kehadiran {    
                        text-align: center;
                    }
                    .row-total-kehadiran td {
                        background: #00b0f0;
                        text-align: center;
                    }
                    .col-note-grand-total {    
                        text-align: center;
                    }
                    .row-grand-total td{
                        background: #ffff00;
                        text-align: center;
                        font-weight: bold;
                    }',  
                 // set mPDF properties on the fly
                'options' => ['title' => 'Iclick Weekly Report'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Iclick Weekly Report'], 
                    'SetFooter'=>['{PAGENO}'],]
                ]);
            
                // return the pdf output as per the destination setting
                return $pdf->render();
        }
        
        return $this->render('report3',['model'=>$model]);
    }

    public function actionReport1() 
    {
            $model = new IwreportSummary();
            if($model->load(Yii::$app->request->post())){           
                $model->generateReport();
            }
        return $this->render('report5',['model'=>$model]);
    }
    public function actionReport2() 
    {
            $model = new IwreportSummary();
            if($model->load(Yii::$app->request->post())){           
                $model->generateReport();
            }
        return $this->render('report4',['model'=>$model]);
    }
}
