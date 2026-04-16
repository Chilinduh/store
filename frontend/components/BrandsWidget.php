<?php

namespace frontend\components;

use common\components\Catalog;
use yii\base\Widget;

class BrandsWidget extends Widget
{

  public $brands = [];
  public $catalog = [];

  public function init()
  {

    $this->catalog = new Catalog();
    foreach ($this->catalog->getCatalog() as $one) {

      if(isset($one['items']) && count($one['items'])) {

        foreach ($one['items'] as $two) {

          if(isset($two['items'])) {

            foreach ($two['items'] as $three) {

              $this->brands[] = $three;
            }
          }

        }
      }
    }

    parent::init();
  }

  public function run()
  {

    return $this->render('brands', [ 'brands' => $this->brands ]);
  }
}
