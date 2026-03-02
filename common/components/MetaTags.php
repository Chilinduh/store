<?php

namespace common\components;

use common\models\Keywords;
use Yii;

class MetaTags extends \yii\base\Component {

  public $title = '';
  public $page = '';

  public function title() {

    return $this->title;
  }


  public function register($page = 'main')
  {

//      if($meta = Keywords::findOne(['page' => $page??''])) {
//
//        Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta->meta_tag_title??''], 'title');
//        Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta->meta_tag_keywords??''], 'keywords');
//        Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta->meta_tag_description??''], 'description');
//
//        Yii::$app->view->title = $meta->title;
//      }
  }
}
