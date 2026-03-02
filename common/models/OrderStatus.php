<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class OrderStatus extends ActiveRecord
{

  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%orders_statuses}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['name'], 'string'],
      [['show', 'status_color_id'], 'integer'],
      [['name'], 'required'],
      ['name', 'unique', 'targetAttribute' => ['name', 'external']]
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Название',
      'status_color_id' => 'Цвет',
      'show' => 'Показать/скрыть',
    ];
  }

  public static function Statuses() {

    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

  public function beforeSave($insert) {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;
  }
}
