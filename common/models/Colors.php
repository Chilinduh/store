<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.09.19
 * Time: 13:25
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Colors extends ActiveRecord
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%product_colors}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'color'], 'string'],
      [['show', 'default'], 'boolean']
    ];
  }

  public function attributeLabels()
  {
    return [
      'name' => 'Название',
      'color' => 'Цвет',
      'show' => 'Показать/скрыть',
      'default' => 'Дефолтный цвет',
    ];
  }

  public static function getAll()
  {

    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;

  }

  public static function Colors()
  {
    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

  public static function getColor(int $id = null)
  {
    return static::findOne($id);
  }
}
