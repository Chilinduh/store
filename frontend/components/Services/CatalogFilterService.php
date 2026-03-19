<?php

namespace frontend\components\Services;

use common\models\Attributes;
use common\models\OrderItems;
use common\models\ProductAttributes;
use common\models\Products;
use common\models\ProductStockBalance;
use common\components\order\Model\OrderStatus;
use yii\helpers\ArrayHelper;
use common\components\Services\CatalogService;


class CatalogFilterService
{

  public function getFilters(int $catalog_id = null, array $params = []) {

    //$catalog = new CatalogService();


/*
    [category_id] => 245
    [filter_checkbox_131] => on
    [filter_slider_134_from] => 19
    [filter_slider_134_to] => 25
    [filter_slider_133_from] => 128
    [filter_slider_133_to] => 141
    [price_slider_from] => 4700
    [price_slider_to] => 158000
*/

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
                'name' => $item['value'],
                'key' => $item['id']
              ];
            }
          }
        }
      }


      echo "<pre>";
      print_r($productAttributesFilter);
      echo "</pre>";
      die;



      $filters = [];
      foreach ($productAttributesFilter as $key=>$items) {

        if(intval($key) && $attribute = Attributes::findOne($key)) {

          if($attribute->attribute_filter_id  === 1) {

            $value = false;
            if(isset($params['filter_checkbox_'.$attribute->id]) && $params['filter_checkbox_'.$attribute->id] == 'on') {
              $value = true;
            }

            $filters[] = [
              'id' => uniqid(),
              'items' => $items,
              'value' => $value??false,
              'type' => 'checkbox',
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
            if(isset($params['filter_slider_'.$attribute->id.'_from'])) {
              $from = $params['filter_slider_'.$attribute->id.'_from'];
            }

            $to = false;
            if(isset($params['filter_slider_'.$attribute->id.'_to'])) {
              $to = $params['filter_slider_'.$attribute->id.'_to'];
            }

            $filters[] = [
              'id' => uniqid(),
              'type' => 'slider',
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

      return $filters;
    }
  }
}


