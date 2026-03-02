<?php

namespace common\models;

use common\models\CargoCarrier;
use Yii;
use \common\models\CargoCar;

/**
 * This is the model class for table "cargo_driver".
 *
 * @property int $id
 * @property string|null $name Имя
 * @property string|null $first_name Фамилия
 * @property string|null $last_name Отчество
 * @property int|null $carrier_id Перевозчик
 * @property int|null $car_id Авто
 * @property string|null $address Адрес
 * @property string|null $phone Телефон
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoDriver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carrier_id', 'car_id'], 'default', 'value' => null],
            [['carrier_id', 'car_id'], 'integer'],
            [['address', 'comment'], 'string'],
            [['created_at', 'deleted_at'], 'safe'],
            [['name', 'first_name', 'last_name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'carrier_id' => 'Перевозчиков',
            'car_id' => 'Авто',
            'address' => 'Address',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

  public function getCarrier()
  {

    return $this->hasOne(CargoCarrier::class, ['id' => 'carrier_id']);
  }

  public function getCar()
  {

    return $this->hasOne(CargoCar::class, ['id' => 'car_id']);
  }


}
