<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "ihub_opr".
 *
 * @property integer $IdOpr
 * @property string $Kode
 * @property string $Nama
 * @property string $Email
 * @property integer $IdGroup
 * @property integer $SPV
 * @property string $TglLahir
 * @property integer $Posisi
 * @property string $password
 * @property string $comment_ontime
 * @property string $comment_latetime
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ihub_opr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdOpr'], 'required'],
            [['IdOpr', 'IdGroup', 'SPV', 'Posisi'], 'integer'],
            [['TglLahir'], 'safe'],
            [['Kode', 'password'], 'string', 'max' => 50],
            [['Nama'], 'string', 'max' => 100],
            [['Email'], 'string', 'max' => 200],
            [['comment_ontime', 'comment_latetime'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdOpr' => 'Id Opr',
            'Kode' => 'Kode',
            'Nama' => 'Nama',
            'Email' => 'Email',
            'IdGroup' => 'Id Group',
            'SPV' => 'Spv',
            'TglLahir' => 'Tgl Lahir',
            'Posisi' => 'Posisi',
            'password' => 'Password',
            'comment_ontime' => 'Comment Ontime',
            'comment_latetime' => 'Comment Latetime',
        ];
    }

    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
        /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    /* modified */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }
 
    /* removed
    public static function findIdentityByAccessToken($token)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    */
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['Email' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    /** EXTENSION MOVIE **/

}
