<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class NavBarWidget extends Widget
{

  public array $categories = [];

  public function init()
  {

    parent::init();
  }

  public function run()
  {

    return $this->render('navBar', ['categories' => $this->categories]);
  }
}







