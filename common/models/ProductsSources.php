<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_sources".
 *
 * @property int $id
 * @property int $product_id Товар
 * @property string|null $source_description Оригинальное описание
 * @property string|null $rewrite_description Рерайт/Копирайт описания
 * @property string|null $source_url Url источник(ов)
 */
class ProductsSources extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'products_sources';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['product_id'], 'required'],
      [['product_id'], 'default', 'value' => null],
      [['product_id'], 'integer'],
      [['source_description', 'rewrite_description', 'source_url'], 'string'],
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
      'source_description' => 'Описание товара (скопированное с сайта)',
      'rewrite_description' => 'Описание товара (рерайт/копипаст)',
      'source_url' => 'Ссылки на источники описаний товара',
    ];
  }
}
