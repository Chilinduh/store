<?php

namespace common\components;

use common\models\Pages as PagesModel;
use Yii;
use yii\helpers\ArrayHelper;

class Pages extends \yii\base\Component
{

  public $pages = [];

  public function init()
  {

    $this->pages = $this->get();
  }

  public function display()
  {

    return $this->pages;
  }

  public function getContent($id = null) {

    return $this->get($id)->text;

  }

  public function get($id = null)
  {

    if ($id) {

      return PagesModel::findOne(['id' => $id]);
    } else {

      $params = ['show' => 1];

      return PagesModel::findAll($params);
    }

  }

}
