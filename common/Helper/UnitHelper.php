<?php

namespace common\Helper;

class UnitHelper
{
  public static function Kg($kg = 0)
  {

    if ($kg) {

      $kg = intval($kg);
      $base = log($kg) / log(1000);
      $suffix = array("кг", "т")[floor($base)];
      return round(pow(1024, $base - floor($base)), 2) . '' . $suffix;
    }
    return 0;
  }
}

