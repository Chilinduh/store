<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class Property extends ActiveRecord
{

  public const STATUS_SALE_ID = 1;
  public const STATUS_NEW_ID = 2;
  public const STATUS_HOT_ID = 3;
  public const BEST_SELLERS_ID = 4;
  public const BEST_PROMOTION_ID = 5;

  const CODE_NEW = 1;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {

    return '{{%property}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {

    return [
      [['name', 'prefix'], 'string'],
      [['name'], 'required'],
      [['show'], 'safe'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Название',
      'prefix' => 'Префикс',
      'show' => 'Пок./скрыть',
    ];
  }

  public static function Property()
  {
    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

}
