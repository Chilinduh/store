<?php

namespace frontend\components\ProductLeftSide;

use common\models\Property;
use common\models\Search\ProductsSearchArrayProvider;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ProductLeftSideWidget extends Widget
{

  public $title = '';
  public $property = '';
  public $products;

  public function init()
  {

    $searchModel = new ProductsSearchArrayProvider();
    $dataProvider = $searchModel->search(['property_id' => $this->property]);

    $this->products = $dataProvider->getModels();

    parent::init();
  }

  public function run()
  {

    return $this->render('items', ['products' => $this->products, 'title' => $this->title]);
  }

}
