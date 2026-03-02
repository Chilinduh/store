<?php

namespace common\models;

use Yii;
use \common\models\CargoCarType;

/**
 * This is the model class for table "cargo_car".
 *
 * @property int $id
 * @property string|null $name Тип перевозки
 * @property int|null $car_type_id Тип авто
 * @property string|null $created_at Дата создания
 */
class CargoCar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_type_id', 'capacity', 'palette' ,'weight'], 'default', 'value' => null],
            [['car_type_id'], 'integer'],
            [['description', 'comment'], 'string'],
            [['created_at', 'capacity', 'palette' ,'weight'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'car_type_id' => 'Тип авто',
            'created_at' => 'Created At',
            'capacity' => 'Объем, м3',
            'palette' => 'Паллетаж, шт',
            'weight' => 'Тоннаж, кг',
            'description' => 'Описание',
            'comment' => 'Комментарий',
        ];
    }

  public function getType()
  {

    return $this->hasOne(CargoCarType::class, ['id' => 'car_type_id']);
  }
}
