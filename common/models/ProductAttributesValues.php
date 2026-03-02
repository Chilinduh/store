<?php

namespace common\models;

use common\models\ProductAttributes;

use Yii;

/**
 * This is the model class for table "product_attributes_values".
 *
 * @property int $id
 * @property int $product_id Товар
 * @property int $product_attribute_id Аттрибут
 * @property string|null $value Значение атрибута
 */
class ProductAttributesValues extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'product_attributes_values';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['product_attribute_id', 'product_id'], 'required'],
      [['product_attribute_id'], 'default', 'value' => null],
      [['product_attribute_id'], 'integer'],
      [['value'], 'string'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'product_id' => 'Товар',
      'product_attribute_id' => 'Product Attribute ID',
      'value' => 'Value',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getAttributesCollection()
  {

    return $this->hasOne(ProductAttributes::class, ['id' => 'product_attribute_id']);
  }
}
