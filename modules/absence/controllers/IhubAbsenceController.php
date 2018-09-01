<?php

namespace app\modules\absence\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;   
use app\modules\absence\models\IhubAbsence\IhubAbsence;
use app\modules\absence\models\IhubAbsence\IhubAbsenceSearch;
use app\modules\absence\models\IhubIbadah\IhubIbadah;
use app\modules\absence\models\IhubOpr\IhubOpr;
use app\modules\absence\models\DataMembers\DataMembers;
use yii\web\Controller;
//use app\modules\absence\controllers\DefaultController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * IhubAbsenceController implements the CRUD actions for IhubAbsence model.
 */
class IhubAbsenceController extends Controller
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
        $service_date = Yii::$app->request->get('service_date'); 
//        $dates = IhubAbsence::find()->where(['IdGroup' => Yii::$app->user->identity->IdGroup, 'tglabsence' => $service_date])->orderBy('tglabsence DESC')->one();
        $ibadah = IhubAbsence::find()->select('ibadah')->where("ihub_absence.IdGroup = ".Yii::$app->user->identity->IdGroup." AND ihub_absence.tglabsence LIKE '".$service_date."%'")->orderBy('tglabsence DESC')->scalar();
        if(empty($ibadah))
        {
           $ibadah = 0; 
        }
        $namaibadah = IhubIbadah::find()->select('namaibadah')->where(['ibadah' => $ibadah])->scalar();
        $allmembers = IhubAbsence::find()->where('ihub_absence.IdGroup = '.Yii::$app->user->identity->IdGroup." AND ihub_absence.ibadah = ".$ibadah." AND ihub_absence.tglabsence LIKE '".date("Y-m-d", strtotime($service_date))."%'")->all();
        
        $late_members = IhubAbsence::find()->where('ihub_absence.IdGroup = '.Yii::$app->user->identity->IdGroup." AND ihub_absence.ibadah = ".$ibadah."  AND ihub_absence.tglabsence LIKE '".date("Y-m-d", strtotime($service_date))."%' AND ihub_absence.status_ontime = 'LATE'")->all();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allmembers' => $allmembers,
            'namaibadah' => $namaibadah,
            'late_members' => count($late_members),
            'service_date' => $service_date,
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
        $nama = IhubOpr::find()->select('Nama')->where(['Kode'=>$this->findModel($idOpr, $tglabsence, $ibadah)->idOpr])->scalar(); 
        return $this->render('view', [
            'model' => $this->findModel($idOpr, $tglabsence, $ibadah),
            'nama' => $nama,
        ]);
    }

    /**
     * Creates a new IhubAbsence model.
     * If blm is successful, the browser will be redirected to the 'view' page.
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

    protected function findModelByLogin()
    {
        if (($model = IhubAbsence::find()->where("ihub_absence.idOpr = ".Yii::$app->user->identity->IdOpr." AND ihub_absence.waktumasuk IS NOT NULL AND ihub_absence.waktukeluar IS NULL")->one()) != null) 
        {
            return $model;
        }
        else
        {
            $model = new IhubAbsence();
            $model->idOpr = Yii::$app->user->identity->IdOpr;
            $model->IdGroup = Yii::$app->user->identity->IdGroup;
            return $model;
        }
    }

    public function actionCheckin()
    {
        if ( Yii::$app->user->isGuest )
        {
            return $this->redirect(['/site/login']);
        }
        
        $model = $this->findModelByLogin();
        if ($model->load(Yii::$app->request->post()))
        {
            if(!$model->isNewRecord)
            {
                return $this->redirect(['ihub-absence/checkout']);
            }
            else
            {
                $model->tglabsence = date('Y-m-d H:i:s', strtotime('+5 minutes'));
                $model->waktumasuk = $model->tglabsence;
                $model->save();
                return $this->redirect(['ihub-absence/checkout']);
            }
        }
        
        $ibadah = IhubIbadah::find()->select(['ibadah','namaibadah','jamawalibadah'])->where(['weekly' => 1])->all();
        
//        foreach($ibadah as $i)
//        {
//            $service[] = $i['namaibadah'];
//            $jam[] = $i['jamawalibadah'];
//        }
        $service = array_fill(0,27,NULL);
        $jam = array_fill(0,27,NULL);
        $avail = array_fill(0,27,NULL);
        for($i = 0; $i < sizeof($ibadah); $i++)
        {
            $service[$ibadah[$i]['ibadah']] = $ibadah[$i]['namaibadah'];
            $jam[$ibadah[$i]['ibadah']] = $ibadah[$i]['jamawalibadah'];
        }
//        $service = array_combine(range(1, count($service)), array_values($service));
//        $jam = array_combine(range(1, count($jam)), array_values($jam));
        if(sizeof($service) > 0)
        {
            for($x = 0; $x < sizeof($service); $x++)
            {
                if(date("l", strtotime($jam[$x])) == date("l", strtotime('+5 days')))
                {
                    $avail[$x] = $service[$x];
                }
            }
        }
        $avail = array_filter($avail, function($value) { return $value !== NULL; });
        $nama = IhubOpr::find()->where(['Kode'=>Yii::$app->user->identity->Kode])->one();  
        
        return $this->render('checkin', [
            'model' => $model, 'service' => $service, 'nama' => $nama, 'ibadah' => $ibadah, 'avail' => $avail, 'jam' => $jam,
        ]);
    }

    public function actionCheckout()
    {        
        $model = $this->findModelByLogin();
        $connection = Yii::$app->getDb();
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            if($model->waktukeluar == null)
            {
                $model->waktukeluar = date('Y-m-d H:i:s', strtotime('+5 minutes'));
                $model->save();
                Yii::$app->getSession()->setFlash('success');           
                return $this->redirect(['ihub-absence/checkin']);
            }
            else
            {
                return $this->redirect(['ihub-absence/checkin']);
            }
        }
        $jam_ibadah = IhubIbadah::find()->where('ihub_ibadah.ibadah = '.$model->ibadah)->one();
//        $command = $connection->createCommand("SELECT jamawalibadah FROM ihub_ibadah WHERE ihub_ibadah.ibadah=".$model->ibadah)->execute();
        $batas_waktu = date("H:i:s", strtotime( $jam_ibadah->jamawalibadah)-1800);
        $comments = IhubOpr::find()->where('ihub_opr.SPV = 1')->one();
        $dayOfWeek = date("l", strtotime($jam_ibadah->jamawalibadah));
        if(date("H:i:s", strtotime($model->waktumasuk)) > $batas_waktu)
        {
            $info = 1;
            $model->status_ontime = 'LATE';
            $model->save();
            $comm = '<h2 style=text-align:center;>'.$comments->comment_latetime.'</h2>';
        }
        else 
        {
            $info = 0;
            $model->status_ontime = 'ON TIME';
            $model->save();
            $comm = '<h2 style=text-align:center;>'.$comments->comment_ontime.'</h2>';
        }
        
        return $this->render('checkout', [
            'model' => $model, 'jam_ibadah' => $batas_waktu, 'info' => $info, 'day' => $dayOfWeek, 'comm' => $comm,
        ]);
    }
}