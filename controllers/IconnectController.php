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

class IconnectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new DataMembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBroadcast()
    {                
        ini_set('max_execution_time', 0);
        $models = DataMembers::find()->where(['in','iconnect_presence',['1','2']])->all();

        foreach($models as $model){            
            $this->generateImage($model);        
            $this->sendEmail($model);
        }                
        
        return $this->redirect(['index']);
    }

    public function actionSend($id, $birthplace)
    {
        $model = $this->findModel($id, $birthplace);
        ini_set('max_execution_time', 0);


        $this->generateImage($model);        
        $this->sendEmail($model);
        return $this->redirect(['index']);
    }

    public function actionView($id, $birthplace)
    {
    	$model = $this->findModel($id, $birthplace);
    	$this->generateImage($model);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    protected function findModel($id, $birthplace)
    {
        if (($model = DataMembers::findOne(['id' => $id, 'birthplace' => $birthplace])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdate($id, $birthplace)
    {
        $model = $this->findModel($id, $birthplace);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    function generateImage($model){

        if($model->iconnect_presence==1 || $model->iconnect_presence==2){
            $model->iconnect_filename = uniqid(date('siHyz'), true);
            $model->update();

            $output = "./iconnect/".$model->iconnect_filename.".jpg";

            $x = 720;
            $y = 480;
            if($model->iconnect_presence==1){
                $image = imagecreatefromjpeg('./images/Encouragement.jpg');
                $origin_x = 540;
                $origin_y = 680;
            } else if($model->iconnect_presence==2){
                $image = imagecreatefromjpeg('./images/Achievement.jpg');
                $origin_x = 540;
                $origin_y = 620;
            }
            
            $blue = imagecolorallocate($image, 95, 73, 255);

            //Colors to use
            $white = imagecolorallocate($image, 255, 255, 25);
            $black = imagecolorallocate($image, 0, 0, 0);
            //$white = imagecolorallocate($image, 255, 255, b255);

            $text = strtoupper($model->fullname);
            $length = strlen($text);

            $min_size = 34;
            $max_size = 100;

            $size = 100-($length*2.2);  
            $font_size = ceil($size);

            if($font_size<$min_size){
                $font_size = $min_size;
            } else if($font_size>$max_size){
                $font_size = $max_size;
            }

            $rotation = 0;
            
            $fonts = "./bn.ttf";



            $text1 = imagefttext($image, $font_size, $rotation, $origin_x, $origin_y, $black, $fonts, $text);

            imagejpeg($image,$output,99);
        }
    }

    function sendEmail($model){    
        
        if($model->iconnect_presence==1 || $model->iconnect_presence==2){    
            $output = "./iconnect/".$model->iconnect_filename.".jpg";

            if($model->iconnect_presence==1){
                $subject = 'Certificate of Encouragement to '.$model->fullname;
                $content = 'Dear '.$model->fullname.'<br /><br />
I-Connect yang lalu begitu luar biasa, namun kami sangat sedih saat mengetahui kamu tidak bisa hadir bersama dengan kami sebagai keluarga dari IHUB.<br />
Kami ingin mengingatkan dan mendorong kamu untuk tidak melewati lagi I-Connect berikutnya.<br />
Dukungan kamu sangat berarti dan kami sangat bersukacita untuk menjangkau visi yang diberikan Tuhan, bersama-sama!<br />
Tanpamu, ini tidak mungkin terjadi.<br /><br />

                Tuhan Yesus Memberkati!';
            } else if($model->iconnect_presence==2){
                $subject = 'Certificate of Achievement to '.$model->fullname;
                $content = 'Dear '.$model->fullname.'<br /><br />
Kami sangat senang dengan kehadiranmu di I-Connect bersama kami.<br />
Kami harap pertemuan ini dapat menginspirasi, memberi arti, dan membuatmu lebih lagi menikmati hubungan dengan Tuhan dan pelayanan bersama dengan kami.<br />
Kami percaya kita ada di hari-hari yang luar biasa untuk bisa melayani Yesus bersama-sama, nantikan perubahan supranatural dan perkenannya lebih lagi di tahun ini!<br /><br />

                Tuhan Yesus Memberkati';
            }
            
            
            Yii::$app->mailer->compose()
                  ->setTo($model->nij1->email)
                  ->setFrom('ihub@gms.or.id')
                  ->setSubject($subject)
                  ->setHtmlBody($content)
                  ->attach($output)
                  ->send();  

            chmod($output, 0644);
            unlink($output);
        }
        
    }
}
