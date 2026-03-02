<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Products;

class ProductItemsWidget extends Widget
{

  public $message;
  public $product;
  public $images;
  public $cartForm;

  public function init()
  {
    parent::init();
    if ($this->message === null) {
      $this->message = 'Hello World';
    }
  }

  public function run()
  {

    return $this->render('item', ['product' => $this->product, 'images' => $this->images, 'cartForm' => $this->cartForm]);
  }

}
