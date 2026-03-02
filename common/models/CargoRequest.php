<?php

namespace common\models;
use \common\models\CargoGood;

use Yii;

/**
 * This is the model class for table "cargo_request".
 *
 * @property int $id
 * @property string $number Номер
 * @property int|null $good_id Груз
 * @property string|null $addressFrom Адрес, погрузки
 * @property string|null $addressTo Адрес, доставки
 * @property string|null $description Описание
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoRequest extends \yii\db\ActiveRecord
{

  public $weight;
  public $capacity;
  public $palette;
  public $counterparty_id;
  public $carrier_id;
  public $counterparty;
  public $carType;
  public $goodType;
  public $address_start;
  public $address_end;
  public $car_type_id;
  public $good_type_id;
  public $driver_id = null;
  public $shipping_id = null;


  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'cargo_request';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['number'], 'required'],
      [['good_id'], 'default', 'value' => null],
      [['good_id', 'car_type_id', 'good_type_id'], 'integer'],
      [['price', 'address_from', 'address_to', 'description', 'comment', 'route_start', 'route_end'], 'string'],
      [['created_at', 'deleted_at', 'date', 'counterparty_id', 'carrier_id', 'counterparty'], 'safe'],
      [['number'], 'string', 'max' => 255],
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


  public function getLogist()
  {

    return $this->hasOne(CargoLogist::class, ['request_id' => 'id']);
  }

  public function getAuthor()
  {

    return $this->hasOne(CargoAuthor::class, ['request_id' => 'id']);
  }

}
