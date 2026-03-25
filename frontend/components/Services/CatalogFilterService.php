<?php

namespace frontend\components\Services;

use common\models\Attributes;
use common\models\OrderItems;
use common\models\ProductAttributes;
use common\models\ProductAttributesValues;
use common\models\Products;
use common\models\ProductStockBalance;
use common\components\order\Model\OrderStatus;
use yii\helpers\ArrayHelper;
use common\components\Services\CatalogService;

class CatalogFilterService
{


  public function getFiltersProducts( array $params = [], $sets = false) {

    $filter = $params['filter'] ?? null;
    $products = [];
    $filtersMain = [];

    if($filter && $category_id = $params['category_id']??false) {

      //[filter] => slider_134:10|33,slider_133:150|160,checkbox_213: 4915,checkbox_213: 4934,

      $attributes = [];
      $filterParams = explode(',', mb_substr($filter, 0, -1));

      if(is_array($filterParams)) {

        foreach ($filterParams as $filterParam) {

          $temp = explode(':', $filterParam);
          $parts = explode('_', $temp[0]);

          if(!in_array($parts[1], ['brand', 'manufacturer', 'price'])) {

            if($parts[0] == 'slider') {
              $attributes[] = [
                'type' => 'slider',
                'attribute_id' => $parts[1],
                'values' => explode('|', $temp[1])
              ];
            }
            if($parts[0] == 'checkbox') {
              if(!isset($attributes[$parts[1]]['items'])) {
                $attributes[$parts[1]] = [
                  'type' => 'checkbox',
                  'items' => []
                ];
              }
              $productAttribute = ProductAttributesValues::findOne($temp[1]);
              $attributes[$parts[1]]['items'][] = [
                'attribute_id' => $parts[1],
                'values' => $temp[1],
                'name' => $productAttribute->value
              ];
            }
          } else {
            $filtersMain[$parts[1]][] = $temp[1];
          }
        }
      }

      if($sets) {
        return [
          'collection' => $attributes,
          'main' => $filtersMain
        ];
      }


      $query = Products::find()->select(['products.id'])
        ->leftJoin(ProductAttributesValues::tableName(), 'product_attributes_values.product_id = products.id')
        ->leftJoin(ProductAttributes::tableName(), 'product_attributes.id = product_attributes_values.product_attribute_id');

      foreach ($attributes as $attribute) {

        if ($attribute['type'] == 'slider') {
          $query->andWhere([
            'and',
            ['=', 'product_attributes.attribute_id', $attribute['attribute_id']],
            ['between', 'product_attributes_values.value', $attribute['values'][0], $attribute['values'][1]]
          ]);
        }

        $checkboxes = [];
        if($attribute['type'] == 'checkbox') {

          foreach ($attribute['items'] as $item) {
            $productAttribute = ProductAttributesValues::findOne($item['values']);
            $checkboxes[] = [
              'and',
              ['=', 'product_attributes_values.product_attribute_id', $item['attribute_id']],
              ['=', 'product_attributes_values.value', $productAttribute->value]
            ];
          }

          $query->andWhere(array_merge(['or'], $checkboxes));
        }
      }

      $products = [];
      if(isset($query)) {
        $query->andWhere(['products.category_id' => $category_id]);

        //echo $query->createCommand()->getRawSql(); die;

        $productIds = $query->asArray()->all();

        foreach ($productIds as $productId) {
          $products[] = $productId['id'];
        }
      }
    }
    return [
      'products' => $products,
      'filtersMain' => $filtersMain
    ];
  }

  public function getFilters(int $catalog_id = null, array $params = []) {

    if($catalog_id) {

      $sets = $this->getFiltersProducts($params, true);

      $productAttributes = Products::getProductAttributes($catalog_id);

      $productAttributes = ArrayHelper::toArray($productAttributes);
      $productAttributesValues = Products::getProductAttributesValues($catalog_id, array_keys($productAttributes));
      $productAttributesValues = ArrayHelper::toArray($productAttributesValues);

      $productAttributesFilter = [];

      foreach ($productAttributesValues as $item) {

        if(!empty($item['value'])) {

          if($productAttribute = ProductAttributes::findOne($item['product_attribute_id'])) {

            if(!isset($productAttributesFilter[$productAttribute['attribute_id']])) {
              $productAttributesFilter[$productAttribute['attribute_id']] = [];
              $temp[$productAttribute['attribute_id']] = [];
            }

            if(!in_array($item['value'], $temp[$productAttribute['attribute_id']])) {

              $checked = false;
              if(isset($sets['collection'])) {
                foreach ($sets['collection'] as $set) {
                  if($set['type'] == 'checkbox') {
                    foreach ($set['items'] as $sitem) {
                      if($sitem['name'] == $item['value']) {
                        $checked = true;
                      }
                    }
                  }
                }
              }


              //<input class="input-check__input filter-collections" data-collection="213" data-attribute="4915" name="filter_4915" type="checkbox">
              $temp[$productAttribute['attribute_id']][] = $item['value'];
              $productAttributesFilter[$productAttribute['attribute_id']][] = [
                'id' => $item['product_attribute_id'],
                'name' => $item['value'],
                'key' => $item['id'],
                'checked' => $checked
              ];
            }
          }
        }
      }

      $filters = [];
      foreach ($productAttributesFilter as $key=>$items) {

        if(intval($key) && $attribute = Attributes::findOne($key)) {

          if($attribute->attribute_filter_id  === 1) {

            $filters[] = [
              'id' => uniqid(),
              'items' => $items,
              'type' => 'checkbox',
              'main' => 0,
              'filter' => 'filter-collections',
              'attribute_id' => $attribute->id,
              'title' => $attribute->name
            ];
          }

          if($attribute->attribute_filter_id  === 2 && count($items)) {

            $validateItems = [];
            foreach ($items as $valid) {
              $validateItems[] = (float)($valid['name']);
            }

            $from = false;
            $to = false;
            if(isset($sets['collection'])) {
              foreach ($sets['collection'] as $set) {
                if($set['type'] == 'slider') {
                  if($set['attribute_id'] == $attribute->id) {
                    $from = $set['values'][0];
                    $to = $set['values'][1];
                  }
                }
              }
            }

            $filters[] = [
              'id' => uniqid(),
              'type' => 'slider',
              'main' => 0,
              'filter' => 'filter-collections',
              'attribute_id' => $attribute->id,
              'title' => $attribute->name,
              'min' => min($validateItems),
              'max' => max($validateItems),
              'from' => $from ? $from : min($validateItems),
              'to' => $to ? $to : max($validateItems),
            ];
          }
        }
      }

      $brands = ArrayHelper::toArray(Products::getProductsBrands($params['category_id']??''));

      if($brands) {
        if(isset($sets['main'])) {
          foreach ($brands as $index=>$brand) {
            foreach ($sets['main'] as $key=>$set) {
              if($key == 'brand' && in_array($brand['id'], $set)) {
                $brands[$index] = array_merge($brands[$index], ['checked' => true]);
              }
            }
          }
        }

        $filters[] = [
          'id' => uniqid(),
          'items' => $brands,
          'value' => $params['brands'] ?? 0,
          'type' => 'checkbox',
          'main' => 1,
          'field' => 'brand',
          'filter' => 'filter-collections',
          'title' => 'Бренд'
        ];
      }

      $manufacturers = ArrayHelper::toArray(Products::getProductsManufacturers($params['category_id']??''));
      if($manufacturers) {
        if(isset($sets['main'])) {
          foreach ($manufacturers as $index=>$manufacturer) {
            foreach ($sets['main'] as $key=>$set) {
              if($key == 'manufacturer' && in_array($manufacturer['id'], $set)) {
                $manufacturers[$index] = array_merge($manufacturers[$index], ['checked' => true]);
              }
            }
          }
        }

        $filters[] = [
          'id' => uniqid(),
          'items' => $manufacturers,
          'value' => $params['manufacturers'] ?? 0,
          'type' => 'checkbox',
          'main' => 1,
          'field' => 'manufacturer',
          'filter' => 'filter-collections',
          'title' => 'Производитель'
        ];
      }

      $from = false;
      $minFrom = false;
      $to = false;
      $maxTo = false;

      if($prices = Products::getProductsPrices($params['category_id'])) {

        $minFrom = min(ArrayHelper::map($prices, 'id', 'price'));
        $maxTo = max(ArrayHelper::map($prices, 'id', 'price'));

        if(isset($sets['main'])) {
          foreach ($sets['main'] as $key=>$set) {
            if($key == 'price') {
              $price = explode('|', $set[0]);
              $from = intval($price[0]);
              $to = intval($price[1]);
            }
          }
        }

        $filters[] = [
          'id' => uniqid(),
          'type' => 'slider',
          'field' => 'price',
          'main' => 1,
          'filter' => 'filter-collections',
          'min' => $minFrom, //min(ArrayHelper::map($products, 'id', 'price')),
          'max' => $maxTo, //max(ArrayHelper::map($products, 'id', 'price')),
          'from' => $from ? $from : $minFrom,
          'to' => $to ? $to : $maxTo,
          'title' => 'Цена'
        ];
      }

      return $filters;
    }
  }
}
