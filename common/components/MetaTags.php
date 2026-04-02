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


  public function register($page = 'main', $data = [])
  {

        switch($page) {

        case 'catalog':
          $main_meta = Keywords::findOne(['page' => 'main']);
          $meta_tag_title = $title = $main_meta->meta_tag_title.' - '.$data['meta_tag_title']??'';
          $meta_tag_keywords = $main_meta->meta_tag_keywords.' - '.$data['meta_tag_keywords']??'';
          $meta_tag_description = $main_meta->meta_tag_description.' - '.$data['meta_tag_description']??'';
          break;

        default:

          if(!empty($page)) {
            $meta = Keywords::find()->where(['page' => $page??''])->one();

            $meta_tag_title = $title = $meta->meta_tag_title??'';
            $meta_tag_keywords = $meta->meta_tag_keywords??'';
            $meta_tag_description = $meta->meta_tag_description??'';
            Yii::$app->view->title = $meta->meta_tag_title;
          }
          break;
      }

      Yii::$app->params['meta'] = [
        'title'=> $meta_tag_title,
        'keywords' => $meta_tag_keywords,
        'description' => $meta_tag_description
      ];
  }
}
