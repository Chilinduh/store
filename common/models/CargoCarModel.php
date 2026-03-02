<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_car_model".
 *
 * @property int $id
 * @property string|null $name Модель
 * @property string|null $created_at Дата создания
 */
class CargoCarModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_car_model';
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
