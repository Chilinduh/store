<?php

namespace common\models;

use Yii;
use \common\models\CargoDriver;

/**
 * This is the model class for table "cargo_good_route".
 *
 * @property int $id
 * @property int|null $good_id Перевозчик
 * @property string|null $address Адрес
 * @property string|null $phone Телефон
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoGoodRoute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_good_route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['good_id'], 'integer'],
            [['city_start', 'city_end', 'comment'], 'string'],
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
            'good_id' => 'Груз',
            'city_start' => 'Город маршрута, вначале',
            'city_end' => 'Город маршрута, в конце',
            'comment' => 'Комментарий',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

  public function getDriverInfo() {

    $drivers = CargoDriver::find()->all();

    $data = [];
    foreach ($drivers as $driver) {

      $data[$driver->id] = $driver->name.' '.$driver->first_name.' '.$driver->last_name.' ';
      if(isset($driver->car)) {

        $data[$driver->id] .= $driver->car->type->name.' ';
        $data[$driver->id] .= $driver->car->weight.'/'.$driver->car->capacity.'/'.$driver->car->palette;
      }
    }

    return $data;
  }

  public function getDriver()
  {

    return $this->hasOne(CargoDriver::class, ['id' => 'driver_id']);
  }

  public function getDirection()
  {

    return $this->hasOne(CargoGoodRouteDirection::class, ['good_route_id' => 'id']);
  }

  public function getShipping()
  {

    return $this->hasMany(CargoGoodRouteShipping::className(), ['good_route_id' => 'id']);
  }

  public function getRoute()
  {

    return $this->hasOne(CargoGoodRoute::class, ['good_route_id' => 'id']);
  }
}
