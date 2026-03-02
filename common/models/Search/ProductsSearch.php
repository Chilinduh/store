<?php

namespace common\models\Search;

use common\models\Manufacturers;
use common\models\Category;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;
use common\Exceptions\ValidationErrorException;
use common\models\Brands;
use common\models\ProductProperty;

class ProductsSearch extends Model
{

  public $name = null;
  public $category_id = null;
  public $group_id = null;
  public $stock_id = null;
  public $color_id = null;
  public $manufacturer_id = null;
  public $description = null;
  public $packaging_type_id = null;
  public $property_id = null;
  public $weight = null;
  public $price = null;
  public $city = null;
  public $main = null;
  public $quantity = null;
  public $code = null;
  public $show = null;
  public $created_at = null;
  public $updated_at = null;
  public $city_id = null;


  public function rules()
  {

    return [
      [['name', 'description'], 'string'],
      [['show', 'main'], 'boolean'],
      [['price', 'color_id', 'weight', 'property_id', 'packaging_type_id', 'weight', 'category_id', 'city_id', 'stock_id', 'manufacturer_id'], 'integer'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'name' => 'Название',
      'category_id' => 'Категория',
      'group_id' => 'Группа',
      'stock_id' => 'ID Склада',
      'color_id' => 'Цвет',
      'manufacturer_id' => 'Производитель',
      'description' => 'Описание',
      'packaging_type_id' => 'Тип упаковки',
      'weight' => 'Вес',
      'price' => 'Цена',
      'city' => 'Город',
      'main' => 'Гл. товар',
      'quantity' => 'Количество',
      'code' => 'Код',
      'show' => 'Пок./скрыть',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
      'property_id' => 'Свойство товара',
    ];

  }

  public function search($params)
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {
      throw ValidationErrorException::create($this->errors);
    }

    $query = Products::find();

    if (isset($params['property_id'])) {

      $query->leftJoin(ProductProperty::tableName(), 'product_property.product_id = products.id')
        ->andWhere(['product_property.property_id' => $params['property_id']]);
    }

    $search = $params['search'] ?? null;
    if ($search) {

      $query->leftJoin(Brands::tableName(), 'brands.id = products.brand_id')
        ->leftJoin(Category::tableName(), 'category.id = products.brand_id')
        ->leftJoin(Manufacturers::tableName(), 'manufacturers.id = products.manufacturer_id')
        ->where(['like', 'products.name', ':search', [':search' => $search]])
        ->orWhere(['like', 'category.name', ':search', [':search' => $search]])
        ->orWhere(['like', 'manufacturers.name', ':search', [':search' => $search]])
        ->orWhere(['like', 'brands.name', ':search', [':search' => $search]]);
    }

    if (isset($params['productsIds'])) {

      $query->orWhere(['in', 'products.id', $params['productsIds']]);
    }

//    $query->select(['products.*', 'products_ballance.stock_id as stock_id'])
//      ->leftJoin('products_ballance', 'products_ballance.product_id = products.id')
//      ->leftJoin('stocks', 'stocks.id = products_ballance.stock_id')
//      ->where(['>', 'products_ballance.quantity', 0])
//      ->andWhere(['products_ballance.show' => Products::STATUS_ACTIVE]);


    $query->andFilterWhere([
      'category_id' => $this->category_id,
    ]);
    $query->andFilterWhere(['like', 'name', $this->name ]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ],
      'sort' => ['attributes' => ['id','price', 'name','code']]
    ]);

    return $dataProvider;
  }

  public function formName()
  {
    return '';
  }

}
