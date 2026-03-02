<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use common\models\Sizes;
use common\models\Colors;
use common\models\Stocks;


class ProductStockBalance extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {

    return '{{%product_stock_balance}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {

    return [
      [['id', 'stock_id', 'size_id', 'product_id', 'color_id', 'quantity'], 'integer']
    ];
  }

  public function attributeLabels()
  {

    return [
      'product_id' => 'Товар',
      'stock_id' => 'Склад',
      'size_id' => 'Размер',
      'color_id' => 'Цвет',
      'quantity' => 'Количество',
      'show' => 'Показать/скрыть',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];

  }

  public function getProduct()
  {

    return $this->hasOne(Products::className(), ['id' => 'product_id']);
  }

  public function getColor()
  {

    return $this->hasOne(Colors::className(), ['id' => 'color_id']);
  }

  public function getSize()
  {

    return $this->hasOne(Sizes::className(), ['id' => 'size_id']);
  }

  public function getStock()
  {

    return $this->hasOne(Stocks::className(), ['id' => 'stock_id']);
  }
}
