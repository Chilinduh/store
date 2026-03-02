<?php

namespace common\models;

use \common\models\CargoDriver;
use Yii;

/**
 * This is the model class for table "cargo_good_route_direction".
 *
 * @property int $id
 * @property int $good_route_id Маршрут
 * @property int $driver_id Водитель
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoGoodRouteDirection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_good_route_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['good_route_id'], 'required'],
            [['good_route_id'], 'integer'],
            [['comment', 'address_start', 'address_end', 'lat_start', 'lon_start', 'lat_end', 'lon_end'], 'string'],
            [['date_start', 'date_end', 'created_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'good_route_id' => 'Маршрут',
            'comment' => 'Комментарий',
            'address_start' => 'Адрес погрузки',
            'address_end' => 'Адрес разгрузки',
            'date_start' => 'Дата погрузки',
            'date_end' => 'Дата разгрузки',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
