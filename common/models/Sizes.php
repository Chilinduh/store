<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Sizes extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%product_size}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['eu_size', 'ru_size'], 'string'],
      [['show', 'default'], 'boolean']
    ];
  }

  public function attributeLabels()
  {
    return [
      'eu_size' => 'EU Размер',
      'ru_size' => 'RU Размер',
      'show' => 'Показать/скрыть',
      'default' => 'Дефолтный цвет',
    ];
  }

  public static function getSize(int $id = null)
  {
    return static::findOne($id);
  }

  public static function getSizes()
  {

    $sizes = static::find()
      ->select(['id', 'CONCAT(eu_size,\' - (\', ru_size, \')\') AS name'])
      ->asArray()
      ->all();

    return $sizes;
  }

}
