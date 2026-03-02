<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_db_suborders".
 *
 * @property int $id
 * @property int|null $db_order_id
 * @property string|null $suborder_number
 * @property string|null $carrier_title
 * @property string|null $carrier_phone
 * @property string|null $carrier_uuid
 * @property string|null $assigned_resource_type_title
 * @property string|null $driver_fio
 * @property string|null $driver_phone
 * @property string|null $tractor_number
 * @property string|null $suborder_status
 * @property string|null $is_loop_exists
 * @property string|null $assigned_tariff_without_vat
 */
class CargoDbSuborders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_db_suborders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['db_order_id'], 'default', 'value' => null],
            [['db_order_id'], 'integer'],
            [['suborder_number', 'carrier_title', 'carrier_phone', 'carrier_uuid', 'assigned_resource_type_title', 'driver_fio', 'driver_phone', 'tractor_number', 'suborder_status', 'is_loop_exists', 'assigned_tariff_without_vat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'db_order_id' => 'Db Order ID',
            'suborder_number' => 'Suborder Number',
            'carrier_title' => 'Carrier Title',
            'carrier_phone' => 'Carrier Phone',
            'carrier_uuid' => 'Carrier Uuid',
            'assigned_resource_type_title' => 'Assigned Resource Type Title',
            'driver_fio' => 'Driver Fio',
            'driver_phone' => 'Driver Phone',
            'tractor_number' => 'Tractor Number',
            'suborder_status' => 'Suborder Status',
            'is_loop_exists' => 'Is Loop Exists',
            'assigned_tariff_without_vat' => 'Assigned Tariff Without Vat',
        ];
    }
}
