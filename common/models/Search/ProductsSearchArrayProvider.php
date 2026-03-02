<?php

namespace common\models\Search;

use common\models\Brands;
use common\models\Category;
use common\models\Sizes;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use common\models\Products;
use common\Exceptions\ValidationErrorException;
use yii\helpers\ArrayHelper;
use common\models\Manufacturers;
use common\models\ProductProperty;
use common\models\Property;
use Yii;
use common\models\ProductStockBalance;
use common\models\Colors;
use common\models\ProductAttributes;
use common\models\Attributes;
use common\models\ProductAttributesValues;
use yii\db\Expression;

class ProductsSearchArrayProvider extends Model
{

  public $id = null;
  public $name = null;
  public $category_id = null;
  public $group_id = null;
  public $stock_id = null;
  public $color_id = null;
  public $manufacturer_id = null;
  public $description = null;
  public $packaging_type_id = null;
  public $weight = null;
  public $price = null;
  public $brands = null;
  public $sort = null;
  public $city = null;
  public $main = null;
  public $quantity = null;
  public $code = null;
  public $show = null;
  public $created_at = null;
  public $updated_at = null;
  public $city_id = null;
  public $price_from = null;
  public $price_to = null;
  public $property_id = null;
  public $color = null;
  public $size = null;
  public $size_id = null;
  public $previous_price = null;
  public $attribute_group_id = null;

  public function rules()
  {

    return [
      [['name', 'description'], 'string'],
      [['show', 'main'], 'boolean'],
      [['id', 'attribute_group_id', 'price', 'color_id', 'weight', 'packaging_type_id', 'weight', 'category_id', 'city_id', 'stock_id', 'color_id', 'size_id', 'manufacturer_id'], 'integer'],
      [['brands', 'property_id', 'color', 'size', 'previous_price'], 'safe'],

    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'name' => 'Название',
      'category_id' => 'Категория',
      'group_id' => 'Группа',
      'stock_id' => 'ID Склада',
      'size_id' => 'ID Склада',
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
      'color' => 'Цвет',
      'size' => 'Размер',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  public function search($params, $type = '')
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {

      throw ValidationErrorException::create($this->errors);
    }

    $query = Products::find();
    $search = $params['search'] ?? null;

    if ($search) {

      $query->leftJoin(Brands::tableName(), 'brands.id = products.brand_id')
        ->leftJoin(Category::tableName(), 'category.id = products.category_id')
        ->leftJoin(Manufacturers::tableName(), 'manufacturers.id = products.manufacturer_id')

        ->orWhere(new Expression('lower(products.name) LIKE \'%' . mb_convert_case($search, MB_CASE_LOWER, "UTF-8") . '%\''))
        ->orWhere(new Expression('lower(products.name) LIKE \'%' . mb_convert_case($search, MB_CASE_TITLE, "UTF-8") . '%\''))

        ->orWhere(new Expression('lower(category.name) LIKE \'%' . mb_convert_case($search, MB_CASE_LOWER, "UTF-8") . '%\''))
        ->orWhere(new Expression('lower(category.name) LIKE \'%' . mb_convert_case($search, MB_CASE_TITLE, "UTF-8") . '%\''))

        ->orWhere(new Expression('lower(manufacturers.name) LIKE \'%' . mb_convert_case($search, MB_CASE_LOWER, "UTF-8") . '%\''))
        ->orWhere(new Expression('lower(manufacturers.name) LIKE \'%' . mb_convert_case($search, MB_CASE_TITLE, "UTF-8") . '%\''))

        ->orWhere(new Expression('lower(brands.name) LIKE \'%' . mb_convert_case($search, MB_CASE_TITLE, "UTF-8") . '%\''))
        ->orWhere(new Expression('lower(brands.name) LIKE \'%' . mb_convert_case($search, MB_CASE_TITLE, "UTF-8") . '%\''));
    }

    if (isset($params['property_id'])) {

      $query->leftJoin(ProductProperty::tableName(), 'product_property.product_id = products.id')
        ->andWhere(['product_property.property_id' => $params['property_id']]);
    }

    //$query->andWhere(['!=', 'products.price', 0]);

    if (isset($params['productsIds'])) {

      $query->andWhere(['in', 'products.id', $params['productsIds']]);
    }

    if (isset($params['price_from'])) {

      $query->andWhere(['>=', 'products.price', intval($params['price_from'])]);
    }

    if (isset($params['price_to'])) {

      $query->andWhere(['<=', 'products.price', intval($params['price_to'])]);
    }

    if (isset($params['brands'])) {

      $query->andWhere(['in', 'products.brand_id', array_keys($params['brands'])]);
    }

    if (isset($params['manufacturers'])) {

      $query->andWhere(['in', 'products.manufacturer_id', array_keys($params['manufacturers'])]);
    }

//    $query->select(['products.*', 'products_ballance.stock_id as stock_id'])
//      ->leftJoin('products_ballance', 'products_ballance.product_id = products.id')
//      ->leftJoin('stocks', 'stocks.id = products_ballance.stock_id')
//      ->where(['>', 'products_ballance.quantity', 0])
//      ->andWhere(['products_ballance.show' => Products::STATUS_ACTIVE]);

    $query->andFilterWhere([
      'id' => $this->id,
      'name' => $this->name,
    ]);

    if (isset($params['categoryIds'])) {

      $query->andWhere(['in', 'products.category_id', array_keys($params['categoryIds'])]);
    } else {
      $query->andFilterWhere([
        'category_id' => $this->category_id,
      ]);
    }

    $products = [];
    foreach ($query->all() as $item) {

      $property = '';
      $productProperty = ProductProperty::findOne(['product_id' => $item->id]);
      if ($productProperty) {
        $property = Property::findOne($productProperty->property_id)->prefix;
      }

      $inFavorite = 0;
      if (!Yii::$app->user->isGuest) {
        $inFavorite = $item->getFavorite()->asArray()->one() ? 1 : 0;
      } else {
        $inFavorite = Yii::$app->favorites->getItem($item->id) ? 1 : 0;
      }

      $colors = [];
      $stocks = ProductStockBalance::find()
        ->where(['product_id' => $item->id])
        ->all();

      $materials = [];
      $productMaterials = $item->getProductMaterials()->all();

      foreach ($productMaterials as $productMaterial) {

        $material = $productMaterial->getMaterial()->one();
        $unit = $productMaterial->getUnit()->one();
        $materials[] = [
          'name' => $material->name,
          'value' => $productMaterial->value,
          'unit' => $unit->name
        ];
      }

      if ($stocks) {

        $default = 0;
        foreach ($stocks as $key => $stock) {

          $color = Colors::find()->where(['id' => $stock->color_id])->asArray()->one();
          $size = Sizes::find()->where(['id' => $stock->size_id])->asArray()->one();
          $colors[$color['id']]['id'] = $color['id'];
          $colors[$color['id']]['default'] = $color['default'];
          $colors[$color['id']]['color'] = $color['color'];
          $colors[$color['id']]['name'] = $color['name'];
          $colors[$color['id']]['sizes'][] = $size;
        }

        $colors = array_values($colors);

        $defaultColor = Colors::find()->where(['default' => 1])->asArray()->one();
        $defaultSize = Sizes::find()->where(['default' => 1])->asArray()->one();

        if (!$item->color_id  && $defaultColor) {

          $item->color_id = $defaultColor['id'];
          $item->color = $defaultColor;
        }

        if ($defaultSize) {
          $item->size_id = $defaultSize['id'];
          $item->size = $defaultSize;
        }
      }

      if ($item->color_id) {

        $color = Colors::findOne($item->color_id);
      }

      if ($item->attribute_group_id) {

        $productAttributes = ProductAttributesValues::find()->where(['product_id' => $item->id])->all();

        foreach ($productAttributes as $productAttribute) {

          if(isset($productAttribute->attributesCollection->attribute_id)) {

            $attribute = Attributes::find()->where(['id' => $productAttribute->attributesCollection->attribute_id])->one();
            $attributes[] = [
              'model' => $productAttribute->attributesCollection,
              'name' => $attribute->name??'',
              'value' => $productAttribute->value
            ];
          }
        }
      }

      $products[] = [
        'id' => $item->id,
        'name' => $item->name,
        'category_id' => $item->category_id,
        'manufacturer_id' => $item->manufacturer_id,
        'packaging_type_id' => $item->packaging_type_id,
        'weight' => $item->weight??'',
        'size_id' => $item->size_id ?? '',
        'color_id' => $item->color_id,
        'color' => $color['name']??false,
        'size' => $item->size ?? '',
        'description' => $item->description,
        'main' => $item->main,
        'show' => $item->show,
        'created_at' => $item->created_at,
        'updated_at' => $item->updated_at,
        'price' => $item->price,
        'code' => $item->code,
        'show_previous_price' => $item->show_previous_price,
        'previous_price' => $item->previousPrice->price??false,
        'brand_id' => $item->brand_id,
        'images' => $item->getFiles()->asArray()->all() ?? [],
        'materials' => $materials??[],
        'attributes' => $attributes??[],
        'manufacturer' => $item->getManufacturer()->asArray()->one() ?? '',
        'brand' => $item->getBrand()->asArray()->one() ?? '',
        'inCart' => Yii::$app->cart->getItem($item->id) ? 1 : 0,
        'inFavorite' => $inFavorite,
        'property' => $property,
        'colors' => $colors ?? [],
      ];
    }

    if ($type == 'model') {

      return $products[0];
    }

    $dataProvider = new ArrayDataProvider(
      [
        'allModels' => $products,
        'pagination' => [
          'pageSize' => $params['per-page'] ?? 10,
        ],
        'sort' => [
          'defaultOrder' => [
            'name' => SORT_ASC,
          ],
          'attributes' => [
            'name',
          ],
        ],
      ]
    );
    return $dataProvider;
  }

  public function formName()
  {
    return '';
  }
}
