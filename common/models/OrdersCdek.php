<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.10.19
 * Time: 16:01
 */

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use common\models\Orders;
use yii\db\ActiveQueryInterface;


class OrdersCdek extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%orders_cdek}}';
  }


  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id', 'order_id', 'city_id', 'tariff_id', 'tariff_sum'], 'integer'],
      [['point_id'], 'string'],
      [['order_id'], 'exist', 'targetClass' => Orders::class, 'targetAttribute' => 'id'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => '# Заказа',
      'user_id' => 'Пользователь',
      'price' => 'Сумма заказа',
      'status_id' => 'Статус',
      'comment' => 'Комментарий',
      'created_at' => 'Дата создания',
    ];
  }

  public static function getOrders()
  {

    return static::findAll(['deleted_at' => NULL]);
  }

  public function getUser()
  {

    return $this->hasOne(User::className(), ['id' => 'user_id'])->one();
  }

  public function getUserProfile()
  {

    return $this->hasOne(UserProfile::className(), ['user_id' => 'user_id'])->one();
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getOrderItems(): ActiveQueryInterface
  {

    return $this->hasMany(OrderItems::class, ['order_id' => 'id']);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProducts(): ActiveQueryInterface
  {

    return $this->hasMany(Products::className(), ['id' => 'product_id'])->via('orderItems');
  }

  public function getStatus()
  {

    return $this->hasOne(OrderStatus::className(), ['id' => 'status_id'])->one();
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

//            $this->show = $this->show == 'on' ? 1 : 0;
      return true;
    }
    return false;
  }
}







