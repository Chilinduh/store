<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class CatalogCenterWidget extends Widget
{

  public array $category = [];

  public function init()
  {

    parent::init();
  }

  public function run()
  {

    return $this->render('catalog_center', []);
  }
}







