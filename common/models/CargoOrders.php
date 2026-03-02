<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_orders".
 *
 * @property int $id
 * @property string $number Номер
 * @property string|null $address_from Адрес, погрузки
 * @property string|null $address_to Адрес, доставки
 * @property string|null $route_start Старт маршрута
 * @property string|null $route_end Конец маршрута
 * @property int|null $counterparty_price Оплата от клиента
 * @property int|null $carrier_price Оплата перевозчику
 * @property int|null $good_type_id Тип груза
 * @property int|null $driver_id Водитель
 * @property int|null $car_type_id Тип машины
 * @property string|null $date Дата
 * @property string|null $description Описание
 * @property string|null $comment Комментарий
 * @property int|null $archive Показать/скрыть
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoOrders extends \yii\db\ActiveRecord
{

  public $weight;
  public $capacity;
  public $palette;
  public $counterparty_id;
  public $counterparty;
  public $carType;
  public $goodType;
  public $address_start;
  public $address_end;
  public $good_type_id;
  public $lat_start;
  public $lon_start;
  public $lat_end;
  public $lon_end;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'cargo_orders';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['address_from', 'address_to', 'description', 'comment'], 'string'],
      [['weight', 'capacity', 'palette'], 'string'],
      [['counterparty_price', 'carrier_price', 'good_type_id', 'driver_id', 'car_type_id', 'archive'], 'default', 'value' => null],
      [['counterparty_price', 'carrier_price', 'good_type_id', 'driver_id', 'car_type_id', 'archive'], 'integer'],
      [['created_at', 'deleted_at', 'date', 'lat_start', 'lon_start', 'lat_end', 'lon_end', 'counterparty_id', 'counterparty'], 'safe'],
      [['number', 'route_start', 'route_end'], 'string', 'max' => 255],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'number' => '№ заказа',
      'capacity' => 'Объем, м3',
      'palette' => 'Паллетаж, шт',
      'weight' => 'Тоннаж, кг',
      'car_type_id' => 'Тип авто',
      'carType' => 'Новый тип авто',
      'good_type_id' => 'Тип товара',
      'goodType' => 'Новый тип товара',
      'address_from' => 'Адрес погрузки, для поиска водителей',
      'address_to' => 'Адрес выгрузки, для поиска водителей',
      'route_start' => 'Город погрузки, для поиска водителей',
      'route_end' => 'Город выгрузки, для поиска водителей',
      'address_start' => 'Фактический адрес погрузки',
      'address_end' => 'Фактический адрес выгрузки',
      'price' => 'Клиент платит',
      'tonnage' => 'Тоннаж, кг',
      'counterparty_id' => 'Клиент',
      'counterparty' => 'Новый Клиент',
      'palletage' => 'Паллетаж, пал',
      'created_at' => 'Created At',
      'deleted_at' => 'Deleted At',
      'comment' => 'Комментарий',
    ];
  }

  public function getGood()
  {

    return $this->hasOne(CargoGood::class, ['id' => 'good_id']);
  }
}
