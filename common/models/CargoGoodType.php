<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_good_type".
 *
 * @property int $id
 * @property string|null $name Тип авто
 * @property string|null $created_at Дата создания
 */
class CargoGoodType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_good_type';
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
