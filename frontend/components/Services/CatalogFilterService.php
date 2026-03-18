<?php

namespace frontend\components\Services;

use common\models\Attributes;
use common\models\OrderItems;
use common\models\ProductAttributes;
use common\models\Products;
use common\models\ProductStockBalance;
use common\components\order\Model\OrderStatus;
use yii\helpers\ArrayHelper;


class CatalogFilterService
{

  public function getFilters(int $catalog_id = null, array $params = []) {

    if($catalog_id) {


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

              $temp[$productAttribute['attribute_id']][] = $item['value'];
              $productAttributesFilter[$productAttribute['attribute_id']][] = [
                'id' => $item['product_attribute_id'],
                'name' => $item['value']
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
              'value' => $item['value']??0,
              'type' => 'checkbox',
              'field' => 'filter',
              'filter_id' => $attribute->id,
              'title' => $attribute->name
            ];
          }

          if($attribute->attribute_filter_id  === 2 && count($items)) {

            $validateItems = [];
            foreach ($items as $valid) {
              $validateItems[] = (float)($valid['name']);
            }

            $filters[] = [
              'id' => uniqid(),
              'type' => 'slider',
              'field' => 'filter',
              'filter_id' => $attribute->id,
              'title' => $attribute->name,
              'min' => min($validateItems),
              'max' => max($validateItems),
              'from' => min($validateItems),
              'to' => max($validateItems),
            ];
          }
        }
      }

      return $filters;
    }
  }
}


