<?php

namespace common\Helper;

class MoneyHelper
{
  public static function price($price = null)
  {

    if($price) {

      return number_format($price, 1, '.', ' ');
    }
    return '';
  }


}

