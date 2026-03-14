<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_availability".
 *
 * @property int $id
 * @property string|null $name Наименование
 */
class ProductsAvailability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_availability';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'color' => 'Цвет',
        ];
    }
}
