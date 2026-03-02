<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_route_type".
 *
 * @property int $id
 * @property string|null $name Тип перевозки
 * @property string|null $created_at Дата создания
 */
class CargoGoodRouteType extends \yii\db\ActiveRecord
{

  const LOADING = 1;
  const UNLOADING = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_route_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
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
            'created_at' => 'Created At',
        ];
    }
}
