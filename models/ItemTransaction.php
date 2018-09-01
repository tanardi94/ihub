<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_transaction".
 *
 * @property integer $trx_no
 * @property string $category
 * @property string $type
 * @property string $item_name
 * @property integer $qty
 * @property string $request_date
 * @property string $pickup_date
 * @property string $return_date
 * @property string $description
 * @property string $pic_request
 * @property string $pic_approval
 * @property integer $status
 */
class ItemTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'type', 'item_name', 'qty', 'request_date', 'pickup_date', 'return_date', 'description', 'pic_request', 'pic_approval', 'status'], 'required'],
            [['qty', 'status'], 'integer'],
            [['request_date', 'pickup_date', 'return_date'], 'safe'],
            [['description'], 'string'],
            [['category', 'type', 'item_name', 'pic_request', 'pic_approval'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trx_no' => 'Trx No',
            'category' => 'Category',
            'type' => 'Type',
            'item_name' => 'Item Name',
            'qty' => 'Qty',
            'request_date' => 'Request Date',
            'pickup_date' => 'Pickup Date',
            'return_date' => 'Return Date',
            'description' => 'Description',
            'pic_request' => 'Pic Request',
            'pic_approval' => 'Pic Approval',
            'status' => 'Status',
        ];
    }
}
