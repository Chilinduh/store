<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_db_orders".
 *
 * @property int $id
 * @property string|null $number
 * @property string|null $order_condition
 * @property string|null $order_view_type
 * @property string|null $external_number
 * @property string|null $status_title
 * @property string|null $order_status
 * @property string|null $created_at
 * @property string|null $viewed_at
 * @property string|null $client_role_code
 * @property string|null $client_title
 * @property string|null $transportation_way
 * @property string|null $resource_type_title
 * @property string|null $loading_dt
 * @property string|null $from_location_title
 * @property string|null $route_points_count
 * @property string|null $to_location_title
 * @property string|null $from_address_title
 * @property string|null $to_address_title
 * @property string|null $unloading_dt
 * @property string|null $margin_percent
 * @property string|null $margin
 * @property string|null $tariff_with_vat
 * @property string|null $order_chat_message
 * @property string|null $weight_in_kg
 * @property string|null $volume_in_cubic_meters
 * @property string|null $pallet_count
 * @property string|null $from_address_fact_slot_start_at
 * @property string|null $from_address_fact_slot_end_at
 * @property string|null $to_address_fact_slot_start_at
 * @property string|null $to_address_fact_slot_end_at
 * @property string|null $period_title
 * @property string|null $period_status
 * @property string|null $creation_type
 * @property string|null $shipping_documents_status
 * @property string|null $shipping_documents_files
 */
class CargoDbOrders extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'cargo_db_orders';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['order_chat_message', 'from_address_fact_slot_end_at', 'to_address_fact_slot_start_at', 'to_address_fact_slot_end_at', 'period_title'], 'string'],
      [['number', 'order_condition', 'order_view_type', 'external_number', 'status_title', 'order_status', 'created_at', 'viewed_at', 'client_role_code', 'client_title', 'transportation_way', 'resource_type_title', 'loading_dt', 'from_location_title', 'route_points_count', 'to_location_title', 'from_address_title', 'to_address_title', 'unloading_dt', 'margin_percent', 'margin', 'tariff_with_vat', 'weight_in_kg', 'volume_in_cubic_meters', 'pallet_count', 'from_address_fact_slot_start_at', 'period_status', 'creation_type', 'shipping_documents_status', 'shipping_documents_files'], 'string', 'max' => 255],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'number' => 'Number',
      'order_condition' => 'Order Condition',
      'order_view_type' => 'Order View Type',
      'external_number' => 'External Number',
      'status_title' => 'Status Title',
      'order_status' => 'Order Status',
      'created_at' => 'Created At',
      'viewed_at' => 'Viewed At',
      'client_role_code' => 'Client Role Code',
      'client_title' => 'Client Title',
      'transportation_way' => 'Transportation Way',
      'resource_type_title' => 'Resource Type Title',
      'loading_dt' => 'Loading Dt',
      'from_location_title' => 'From Location Title',
      'route_points_count' => 'Route Points Count',
      'to_location_title' => 'To Location Title',
      'from_address_title' => 'From Address Title',
      'to_address_title' => 'To Address Title',
      'unloading_dt' => 'Unloading Dt',
      'margin_percent' => 'Margin Percent',
      'margin' => 'Margin',
      'tariff_with_vat' => 'Tariff With Vat',
      'order_chat_message' => 'Order Chat Message',
      'weight_in_kg' => 'Weight In Kg',
      'volume_in_cubic_meters' => 'Volume In Cubic Meters',
      'pallet_count' => 'Pallet Count',
      'from_address_fact_slot_start_at' => 'From Address Fact Slot Start At',
      'from_address_fact_slot_end_at' => 'From Address Fact Slot End At',
      'to_address_fact_slot_start_at' => 'To Address Fact Slot Start At',
      'to_address_fact_slot_end_at' => 'To Address Fact Slot End At',
      'period_title' => 'Period Title',
      'period_status' => 'Period Status',
      'creation_type' => 'Creation Type',
      'shipping_documents_status' => 'Shipping Documents Status',
      'shipping_documents_files' => 'Shipping Documents Files',
    ];
  }

  public function getSubOrders()
  {

    return $this->hasMany(CargoDbSuborders::class, ['db_order_id' => 'id']);
  }

  public function getLogist()
  {

    return $this->hasOne(CargoDbLogist::class, ['db_order_id' => 'id']);
  }

  public function getAuthor()
  {

    return $this->hasOne(CargoDbAuthor::class, ['db_order_id' => 'id']);
  }

}
