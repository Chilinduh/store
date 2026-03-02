<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good_write_off".
 *
 * @property int $id
 * @property string|null $name Название товара
 * @property string|null $code Штрих код
 * @property int|null $count Количество товара
 * @property int|null $good_write_off_status_id Статус заявки
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class GoodWriteOff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_write_off';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'good_write_off_status_id'], 'default', 'value' => null],
            [['good_write_off_status_id'], 'integer'],
            [['created_at', 'deleted_at'], 'safe'],
            [['name', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'count' => 'Кол-во',
            'id' => 'ID',
            'name' => 'Название',
            'code' => 'ШК',
            'good_write_off_status_id' => 'Статус',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getStatus()
    {

      return $this->hasOne(GoodWriteOffStatus::class, ['id' => 'good_write_off_status_id'])->one();
    }
}
