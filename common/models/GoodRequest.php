<?php

namespace common\models;

use common\models\GoodRequestStatus;
use Yii;

/**
 * This is the model class for table "good_request".
 *
 * @property int $id
 * @property string|null $name Название товара
 * @property string|null $count Количество товара
 * @property int|null $good_request_status_id Статус заявки
 * @property int|null $show Показать/скрыть
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class GoodRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'created_at', 'deleted_at'], 'safe'],
            [['show'], 'default', 'value' => 1],
            [['good_request_status_id'], 'default', 'value' => 0],
            [['good_request_status_id', 'show'], 'integer'],
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
            'name' => 'Название',
            'count' => 'Количество',
            'good_request_status_id' => 'Статус',
            'show' => 'Show',
            'created_at' => 'Дата',
            'deleted_at' => 'Deleted At',
        ];
    }

  public function getStatus()
  {

    return $this->hasOne(GoodRequestStatus::className(), ['id' => 'good_request_status_id']);
  }

}
