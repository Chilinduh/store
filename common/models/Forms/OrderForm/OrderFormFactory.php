<?php

namespace common\models\Forms\OrderForm;

use Exception;

abstract class OrderFormFactory
{

  public string $type = '';

  public const CART = '';
  public const CART_EXTENDED = 'Extended';

  public static function get(String $type = '')
  {
    $className = 'common\models\Forms\OrderForm\OrderForm' . $type;
    if (class_exists($className)) {
      return new $className;
    }

    throw new Exception("Class does not exists");
  }
}
