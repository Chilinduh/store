<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class CartItems extends ActiveRecord
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%cart_items}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['product_id', 'cart_id', 'quantity'], 'required'],
      [['product_id', 'cart_id', 'quantity'], 'integer'],
    ];
  }

  public static function Cart() {

    return static::findAll(['user_id' => self::STATUS_ACTIVE]);
  }

  public function beforeSave($insert) {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;
  }
}
