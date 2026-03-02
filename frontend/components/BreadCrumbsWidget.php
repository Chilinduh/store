<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class BreadCrumbsWidget extends Widget
{

  public array $breadCrumbs = [];

  public function init()
  {
    parent::init();
  }

  public function run()
  {
    return $this->render('breadCrumbs', ['breadCrumbs' => $this->breadCrumbs??[]]);
  }
}
