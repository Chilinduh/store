<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.10.22
 * Time: 16:10
 */
namespace frontend\components\CatalogMenuLeft;

use yii\base\Widget;
use yii\helpers\Html;

class CatalogMenuLeftWidget extends Widget
{
  public $catalog;
  public $category;

  public function init()
  {

    parent::init();
  }

  public function run()
  {

    return $this->render('header_menu_left', [
      'catalog' => $this->catalog,
      'category' => $this->category
    ]);
  }
}


