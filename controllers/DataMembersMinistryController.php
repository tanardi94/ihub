<?php

namespace app\controllers;

use Yii;
use app\models\DataMembers\DataMembers;
use app\models\DataMembers\DataMembersMinistry;
use app\models\DataMembers\DataMembersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataMembersMinistryController implements the CRUD actions for DataMembersMinistry model.
 */
class DataMembersMinistryController extends Controller
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
     * Lists all DataMembersMinistry models.
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
     * Displays a single DataMembersMinistry model.
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
     * Creates a new DataMembersMinistry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataMembersMinistry();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nij]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DataMembersMinistry model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nij]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate1()
    {
        $model = $this->findModelByLogin();        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $member = DataMembers::find()->where(['nij'=>Yii::$app->user->identity->Kode])->one();
            $member->recommitment_end = new \yii\db\Expression('NOW()');
            $member->save();
            return $this->redirect(['data-members/view1']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DataMembersMinistry model.
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
     * Finds the DataMembersMinistry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataMembersMinistry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataMembersMinistry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelByLogin(){
        if (($model = DataMembersMinistry::find()->where(['nij'=>Yii::$app->user->identity->Kode])->one()) !== null) {
            return $model;
        } else {
            $model = new DataMembersMinistry();
            $model->position = 1;
            $model->status = 1;
            $model->nij = Yii::$app->user->identity->Kode;        
            return $model;
        }
    }

    public function actionPresensi()
    {
        $model = new DataMembersMinistry();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('presensi', [
            'model' => $model,
        ]);
    }
}
