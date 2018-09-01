<?php

namespace app\models\ItemStock;

use Yii;

/**
 * This is the model class for table "item_stock".
 *
 * @property integer $id
 * @property string $item_name
 * @property string $category
 * @property string $description
 * @property integer $qty
 * @property string $qty_type
 */
class ItemStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'category', 'description', 'qty', 'qty_type'], 'required'],
            [['description'], 'string'],
            [['qty'], 'integer'],
            [['item_name', 'category', 'qty_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'Item Name',
            'category' => 'Category',
            'description' => 'Description',
            'qty' => 'Qty',
            'qty_type' => 'Qty Type',
        ];
    }
}
