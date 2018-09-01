<?php

namespace app\controllers;

use Yii;
use app\models\Erform\Erform;
use app\models\Erform\ErformSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ErformController implements the CRUD actions for Erform model.
 */
class ErformController extends Controller
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
     * Lists all Erform models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ErformSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $erform = Erform::find()->where(['etype' => 1])->all();
        $erform2 = Erform::find()->where(['etype' => 2])->all();
        $erform3 = Erform::find()->where(['etype' => 3])->all();
        $erform4 = Erform::find()->where(['etype' => 4])->all();

        if (Yii::$app->user->isGuest){
        return $this->render('index2',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        } elseif (Yii::$app->user->identity->SPV == '1') {
            return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'erform'=>$erform,
            'erform2'=>$erform2,
            'erform3'=>$erform3,
            'erform4'=>$erform4,
            ]);
        } else {
        return $this->render('index2',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        }
            
    }

    /**
     * Displays a single Erform model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Erform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Erform();
        
        if ($model->load(Yii::$app->request->post()))
        {
            $model->service_req = json_encode($model->service_req);
            $model->status = 1;
            

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);

                
            } else {
                var_dump($model->getErrors());exit;
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Erform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()))
        {
            $model->service_req = json_encode($model->service_req);
            $model->status = 1;

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                var_dump($model->getErrors());exit;
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Erform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Erform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Erform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Erform::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
