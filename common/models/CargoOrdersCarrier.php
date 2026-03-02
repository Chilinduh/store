<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_orders_carrier".
 *
 * @property int $id
 * @property int|null $order_id Груз
 * @property int|null $carrier_id Перевозчик
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoOrdersCarrier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_orders_carrier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'carrier_id'], 'default', 'value' => null],
            [['order_id', 'carrier_id'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'carrier_id' => 'Carrier ID',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
