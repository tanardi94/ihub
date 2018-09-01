<?php

namespace app\controllers;

use Yii;
use app\models\DataMembers\DataMembers;
use app\models\DataMembers\DataMembersSearch;
use app\models\DataMembers\DataMembersChurch;
use app\models\DataMembers\DataMembersContacts;
use app\models\DataMembers\DataMembersFamily;
use app\models\DataMembers\DataMembersOccupation;
use app\models\DataMembers\DataMembersMinistry;
use app\models\IhubOpr\IhubOpr;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataMembersController implements the CRUD actions for DataMembers model.
 */
class DataMembersController extends Controller
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
     * Lists all DataMembers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DataMembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataMembers model.
     * @param integer $id
     * @param string $birthplace
     * @return mixed
     */
    public function actionView($id, $birthplace)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $birthplace),
        ]);
    }

    /**
     * Creates a new DataMembers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataMembers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'birthplace' => $model->birthplace]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DataMembers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $birthplace
     * @return mixed
     */
    public function actionUpdate($id, $birthplace)
    {
        $model = $this->findModel($id, $birthplace);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'birthplace' => $model->birthplace]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    


    /**
     * Deletes an existing DataMembers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $birthplace
     * @return mixed
     */
    public function actionDelete($id, $birthplace)
    {
        $this->findModel($id, $birthplace)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataMembers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $birthplace
     * @return DataMembers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $birthplace)
    {
        if (($model = DataMembers::findOne(['id' => $id, 'birthplace' => $birthplace])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelByLogin(){
        if (($model = DataMembers::find()->where(['nij'=>Yii::$app->user->identity->Kode])->one()) !== null) {
            return $model;
        } else {            
            $model = new DataMembers();
            $model->nij = Yii::$app->user->identity->Kode;        
            return $model;
        }
    }

    public function actionProfile($nij)
    {
        $model = $this->request->get($nij, 101980);

        if ($model->load(Yii::$app->request->get($nij))) {
            return $this->render('view1', ['model' => $model,]);
        } else {
            //
        }
    }
    
    public function actionRecommitment()
    {        
        //$model = IhubOpr::find()->where(['IdOpr' => Yii::$app->user->id])->one();        
        $model = $this->findModelByLogin();   

        if ($model->load(Yii::$app->request->post())){
            if(!$model->isNewRecord){
                $model->recommitment_start = new \yii\db\Expression('NOW()');
                $model->save();
            }
                        
            return $this->redirect(['data-members/update1']);            
        }

        $sexes = ['0'=>'Male', '1'=>'Female'];  
        return $this->render('recommitment', [
            'model' => $model, 'sexes' => $sexes
        ]);
    }
    
    public function actionUpdate1()
    {
        $model = $this->findModelByLogin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->recommitment_start==null){
                $model->recommitment_start = new \yii\db\Expression('NOW()');
            }
            return $this->redirect(['data-members-contacts/update1']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionView1()
    {
        return $this->render('view1', [
            'model' => $this->findModelByLogin(),
        ]);
    }
}
