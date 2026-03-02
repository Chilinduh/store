<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Brand extends ActiveRecord
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%brand}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['name'], 'string'],
      [['show'], 'integer'],
      [['name'], 'required'],
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Название',
      'show' => 'Показать/скрыть',
    ];
  }

  public static function Brands() {

    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

  public function beforeSave($insert) {

    if (parent::beforeSave($insert)) {

      $this->show = $this->show == 'on' ? 1 : 0;
      return true;
    }
    return false;

  }


}
