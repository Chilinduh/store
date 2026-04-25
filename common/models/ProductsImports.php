<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_imports".
 *
 * @property int $id
 * @property string|null $source Источник
 * @property string|null $data данные
 * @property string|null $name Цвет текст
 * @property string $link Ссылка
 */
class ProductsImports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_imports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['name', 'links'], 'string'],
            [['links'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source' => 'Source',
            'name' => 'name',
            'links' => 'Link',
        ];
    }

  public function getProductsImportsData()
  {

    return $this->hasMany(ProductsImportsData::class, ['product_import_id' => 'id']);
  }

  public function getProductsImportsPages()
  {

    return $this->hasMany(ProductsImportsPages::class, ['product_import_id' => 'id']);
  }


}
