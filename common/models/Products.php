<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

use common\models\ProductsSizes;
use common\components\ArrayableTrait;

class Products extends ActiveRecord
{

  use ArrayableTrait;

  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  public $city_id;
  public $stock_id;
  public $size_id;
  public $property_id;
  public $file;
  public $color;
  public $size;
  public $images;
  public $manufacturer;
  public $brand;
  public $inCart;
  public $inFavorite;
  public $property;
  public $colors;
  public $materials;
  public $previous_price = null;
  public $attributes = null;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {

    return '{{%products}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'code', 'description'], 'string'],
      [['show', 'main', 'show_previous_price'], 'boolean'],
      [['id', 'attribute_group_id', 'price', 'property_id', 'color_id', 'size_id', 'brand_id', 'packaging_type_id', 'category_id', 'city_id', 'stock_id', 'manufacturer_id'], 'integer'],
      [['name', 'category_id'], 'required'],
      [['attributes', 'manufacturer', 'file', 'color_id', 'size_id', 'color', 'size', 'weight', 'previous_price'], 'safe'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Название',
      'category_id' => 'Категория',
      'attribute_group_id' => 'Группа атрибутов',
      'group_id' => 'Группа',
      'stock_id' => 'ID Склада',
      'brand_id' => 'Бренд',
      'color_id' => 'Цвет',
      'size_id' => 'Цвет',
      'city_id' => 'Город',
      'property_id' => 'Свойство',
      'manufacturer_id' => 'Производитель',
      'manufacturer' => 'Производитель',
      'description' => 'Описание',
      'packaging_type_id' => 'Тип упаковки',
      'weight' => 'Вес',
      'price' => 'Цена',
      'city' => 'Город',
      'main' => 'Гл. товар',
      'quantity' => 'Количество',
      'code' => 'Артикул',
      'color' => 'Цвет',
      'size' => 'Размер',
      'show_previous_price' => 'Пок./скрыть старую цену',
      'show' => 'Пок./скрыть',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  public function file($options = [])
  {
//        print_r(Files::find()->where(['table_id'=>$this->id])->andWhere(['table_name' => 'products', 'main' => 1])->one()); die;
    return Files::find()->where(['table_id' => $this->id])->andWhere(['table_name' => 'products'])->one();
  }

  public function getIngredients()
  {

    return $this->hasMany(ProductsIngredients::className(), ['product_id' => 'id']);
  }

  public function getPackagingType()
  {

    return $this->hasOne(PackagingType::className(), ['id' => 'packaging_type_id'])->one();
  }


  public function color()
  {

    return $this->hasOne(Colors::className(), ['id' => 'color_id'])->one();
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProductProperty()
  {

    return $this->hasOne(ProductProperty::class, ['product_id' => $this->id]);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProperty()
  {

    return $this->hasOne(Property::className(), ['id' => 'property_id'])->via('productProperty');
  }

  public function getAttributesGroups()
  {

    return $this->hasMany(AttributesGroups::className(), ['id' => 'attribute_group_id']);
  }


  public function getAttributesValues()
  {

    return $this->hasMany(ProductAttributesValues::className(), ['product_id' => 'id']);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProductUnit()
  {

    return $this->hasOne(Units::class, ['id' => 'unit_id']);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getPreviousPrice()
  {

    return $this->hasOne(ProductPrices::class, ['product_id' => 'id'])->orderBy('id DESC')->offset(1)->limit(1);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProductMaterials()
  {

    return $this->hasMany(ProductMaterials::class, ['product_id' => 'id']);
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProductPrices()
  {

    return $this->hasMany(ProductPrices::class, ['product_id' => 'id']);
  }

  public function getProductSources()
  {

    return $this->hasOne(ProductsSources::class, ['product_id' => 'id']);
  }

  public function getMaterials()
  {

    return $this->hasMany(Materials::class, ['id' => 'material_id'])->via('productMaterials');
  }

  public static function getProductAttributes($category_id)
  {
    return ProductAttributesValues::find()->select('product_attributes_values.product_attribute_id, product_attributes_values.value')
      ->leftJoin(Products::tableName(), 'products.id = product_attributes_values.product_id')
      ->where(['products.category_id' => $category_id])->groupBy(['product_attribute_id', 'product_attributes_values.value'])
      ->all();
  }

  public function getProducts($settings)
  {

    return $this->hasMany(ProductStockBalance::className(), ['product_id' => 'id', 'city_id' => $settings->id]);
//        return $this->hasMany(ProductsBalance::className(), ['product_id' => 'id'])
//      ->viaTable(ElementCategory::tableName(), ['category_id' => 'id']);
  }

  public function getProductsInWeightGroup($group_id)
  {

    return $this->hasMany(ProductsWeightGroup::className(), ['product_id' => 'id', 'group_id' => $group_id]);
//        return $this->hasMany(ProductsBalance::className(), ['product_id' => 'id'])
//      ->viaTable(ElementCategory::tableName(), ['category_id' => 'id']);
  }

  public function getProductsInColorGroup($group_id)
  {

    return $this->hasMany(ProductsColorGroup::className(), ['product_id' => 'id', 'group_id' => $group_id]);
//        return $this->hasMany(ProductsBalance::className(), ['product_id' => 'id'])
//      ->viaTable(ElementCategory::tableName(), ['category_id' => 'id']);
  }

  public function getCity()
  {

    return $this->hasOne(City::className(), ['id' => 'city_id'])->one();
  }

  public function getStock()
  {

    return $this->hasOne(Stocks::className(), ['id' => 'stock_id'])->one();
  }


  public function weight()
  {

    return $this->hasOne(Category::className(), ['id' => 'category_id'])->one();
  }

  public function group($settings)
  {

    return $this->hasOne(ProductStockBalance::className(),
      ['id' => 'product_id'])
      ->andWhere(['product_balance.city_id' => $settings ? $settings->city_id : 1])
      ->one();
  }

  public function getCategory()
  {

    return $this->hasOne(Tree::className(), ['id' => 'category_id']);
  }

  public function hasGroup()
  {

    return $this->hasOne(ProductsWeightGroup::className(), ['product_id' => 'id'])->one();
  }

  public static function getAllInGroup($settiongs = false)
  {

    return static::find()
      ->leftJoin('product_balance pb', 'pb.product_id = products.id')
      ->where('pb.group_id = pbg.group_id')
      ->where('pb.city_id = pbg.city_id')
      ->andWhere(['>', 'pb.quantity', 0])
      ->andWhere(['pb.city_id' => $settiongs ? $settiongs->city_id : 1])
      ->andWhere(['pb.show' => self::STATUS_ACTIVE]);
  }

  public static function products()
  {

    return static::find();
  }

  public static function getAll($settings = false, $params = [])
  {

    $products = static::find()->select(['products.*', 'product_balance.stock_id as stock_id'])
      ->leftJoin('product_balance', 'product_balance.product_id = products.id')
      ->leftJoin('stocks', 'stocks.id = product_balance.stock_id')
      ->where(['>', 'product_balance.quantity', 0])
      ->andWhere(['product_balance.show' => self::STATUS_ACTIVE]);
//
//        if(isset($params['name'])) {
//            $products->filterWhere(['like', 'products.name', $params['name']]);
//        }
//
//        if(isset($params['city_id'])) {
//            $products->andWhere(['stocks.id' => $params['city_id']]);
//        } else {
//            $products->andWhere(['stocks.id' => $settiongs ? $settiongs->city_id : 1]);
//        }
//
//        if(isset($params['manufacturer_id'])) {
//            $products->andWhere(['products.manufacturer_id' => $params['manufacturer_id']]);
//        }
//
//        if(isset($params['category_id'])) {
//            $products->andWhere(['products.category_id' => $params['category_id']]);
//        }
//
//                if(isset($params['packaging_type_id'])) {
//            $products->andWhere(['products.packaging_type_id' => $params['packaging_type_id']]);
//        }

    return $products;
  }


  public function getProductBalance()
  {

    return $this->hasMany(ProductStockBalance::className(), ['product_id' => 'id']);
  }

  public function getStockSizes()
  {

    return $this->hasMany(Sizes::className(), ['id' => 'size_id'])->via('productBalance');
  }

  public function getStockColors()
  {

    return $this->hasMany(Colors::className(), ['id' => 'color_id'])->via('productBalance');
  }

  public function getFiles()
  {

    return $this->hasMany(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'products'])->orderBy('main DESC');
  }

  public function getFavorite()
  {

    return $this->hasOne(UserFavorites::className(), ['product_id' => 'id'])
      ->andWhere(['user_id' => Yii::$app->user->identity->id]);
  }

  public function getManufacturer()
  {
    return $this->hasOne(Manufacturers::className(), ['id' => 'manufacturer_id']);
  }

  public function getBrand()
  {
    return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
  }

  public static function getProductsBrands(int $category_id): array
  {

    return self::find()->select(['brands.id', 'brands.name'])
      ->LeftJoin('brands', 'brands.id = products.brand_id')
      ->distinct()
      ->where(['products.category_id' => $category_id])
      ->andWhere(['!=', 'brands.name', ''])
      ->asArray()->all();
  }

  public static function getProductsManufacturers(int $category_id): array
  {

    return self::find()->select(['manufacturers.id', 'manufacturers.name'])
      ->LeftJoin('manufacturers', 'manufacturers.id = products.manufacturer_id')
      ->distinct()
      ->where(['products.category_id' => $category_id])
      ->andWhere(['!=', 'manufacturers.name', ''])
      ->asArray()->all();
  }

  public static function getProductsPrices(int $category_id): array
  {

    if (!$category_id) return [];

    return self::find()
      ->where(['products.category_id' => $category_id])
      ->andWhere(['!=', 'products.name', 0])
      ->asArray()->all();
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {


      return true;
    }
    return false;
  }

  public function afterFind()
  {

    $this->city_id = 1; //Yii::$app->session->get('settings')->city_id;
    parent::afterFind();
  }
}
