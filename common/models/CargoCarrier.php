<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_carrier".
 *
 * @property int $id
 * @property string|null $name Перевозчик
 * @property string|null $fio Контактное лицо
 * @property string|null $address Адрес
 * @property string|null $phone Телефон
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoCarrier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_carrier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'comment'], 'string'],
            [['created_at', 'deleted_at'], 'safe'],
            [['name', 'fio', 'phone'], 'string', 'max' => 255],
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
            'fio' => 'Fio',
            'address' => 'Address',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
