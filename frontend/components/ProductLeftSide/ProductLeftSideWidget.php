<?php

namespace frontend\components\ProductLeftSide;

use common\components\Catalog;
use common\models\Property;
use common\models\Search\ProductsSearchArrayProvider;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ProductLeftSideWidget extends Widget
{

  public $title = '';
  public $property = '';
  public $category_id = '';
  public $mode = '';
  public $products;

  public function init()
  {

    $searchModel = new ProductsSearchArrayProvider();

    if ($this->mode == 'by-views' && $this->category_id) {
      $catalogComponent = new Catalog();

      $catalog = $catalogComponent->getCatalog($this->category_id) ?? [];
      if($children = $catalog['sub']??false) {
        $categoryIds = $children;
      } else {
        $categoryIds[$this->category_id] = $this->category_id;
      }

      $dataProvider = $searchModel->search(['categoryIds' => $categoryIds, 'orders' => ['views'=> SORT_DESC]]);

    } else {

      $dataProvider = $searchModel->search(['property_id' => $this->property]);
    }

    $this->products = $dataProvider->getModels();
    parent::init();
  }

  public function run()
  {

    return $this->render('items', ['products' => $this->products, 'title' => $this->title]);
  }
}
