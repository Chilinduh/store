<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_good_route_shipping".
 *
 * @property int $id
 * @property int|null $good_route_id Груз
 * @property int|null $driver_id Водитель
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoGoodRouteShipping extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'cargo_good_route_shipping';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['good_route_id', 'driver_id', 'carrier_id'], 'default', 'value' => null],
      [['good_route_id', 'driver_id', 'price', 'carrier_id'], 'integer'],
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
      'good_route_id' => 'Good Route ID',
      'driver_id' => 'Driver ID',
      'carrier_id' => 'Driver ID',
      'price' => 'Цена',
      'comment' => 'Comment',
      'created_at' => 'Created At',
      'deleted_at' => 'Deleted At',
    ];
  }

  public function getDriver()
  {

    return $this->hasOne(CargoDriver::class, ['id' => 'driver_id']);
  }


  public function getCarrier()
  {

    return $this->hasOne(CargoCarrier::class, ['id' => 'carrier_id']);
  }
}
