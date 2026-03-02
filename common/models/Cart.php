<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Query\CartQuery;
use common\models\CartItems;

class Cart extends ActiveRecord
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%cart}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['user_id'], 'required'],
      [['user_id'], 'integer'],
    ];
  }

  /**
   * @return CartQuery
   */
  public static function find(): CartQuery
  {
    return new CartQuery(static::class);
  }

  public static function getCart()
  {

    return self::find()->byActive()->byUser()->one();
  }

  public function getCartItems()
  {
    return $this->hasMany(CartItems::class, ['cart_id' => 'id']);
  }


  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;
  }
}
