<?php

namespace frontend\components;

use common\models\Brands;
use yii\base\Widget;

class BrandsWidget extends Widget
{

  public $brands = [];

  public function init()
  {

    $this->brands = Brands::find()->where(['show_in_blocks' => 1])->all();

    parent::init();
  }

  public function run()
  {

    return $this->render('brands', [ 'brands' => $this->brands ]);
  }
}
