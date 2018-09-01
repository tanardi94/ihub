<?php

namespace app\models\TblAdditional;

use Yii;

/**
 * This is the model class for table "tbl_speaker".
 *
 * @property integer $speaker_id
 * @property string $speakername
 * @property string $speakertype
 */
class TblSpeaker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_speaker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speakername', 'speakertype'], 'required'],
            [['speakername', 'speakertype'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'speaker_id' => 'Speaker ID',
            'speakername' => 'Speakername',
            'speakertype' => 'Speakertype',
        ];
    }
}
