<?php

namespace app\models\DataMembers;

use Yii;

/**
 * This is the model class for table "data_members_ministry".
 *
 * @property integer $nij
 * @property string $ministry_year
 * @property integer $team
 * @property integer $position
 * @property integer $status
 */
class DataMembersMinistry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_members_ministry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nij', 'ministry_year', 'team', 'position', 'status'], 'required'],
            [['nij', 'team', 'position', 'status'], 'integer'],
            [['ministry_year'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nij' => 'Nij',
            'ministry_year' => 'Ministry Year',
            'team' => 'Team',
            'position' => 'Position',
            'status' => 'Status',
        ];
    }
}
