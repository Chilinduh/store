<?php
namespace common\models;

use common\models\Products;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use common\models\User;

class OrderItems extends ActiveRecord
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%order_items}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {

    return [
      [['product_id', 'order_id', 'quantity'], 'required'],
      [['product_id', 'order_id', 'quantity'], 'integer'],
      [['order_id'], 'exist', 'targetClass' => Orders::class, 'targetAttribute' => 'id'],
      [['product_id'], 'exist', 'targetClass' => Products::class, 'targetAttribute' => 'id'],
    ];
  }

  public static function Cart() {

    return static::findAll(['user_id' => self::STATUS_ACTIVE]);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProduct()
  {

    return $this->hasOne(Products::className(), ['id' => 'product_id']);
  }


  public function beforeSave($insert) {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;
  }
}
