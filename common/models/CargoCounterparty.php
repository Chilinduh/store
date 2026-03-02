<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_counterparty".
 *
 * @property int $id
 * @property string|null $name Название контрагента
 * @property string|null $address Адрес
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 */
class CargoCounterparty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_counterparty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'comment'], 'string'],
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
            'address' => 'Address',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }
}
