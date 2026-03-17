<?php

namespace frontend\components\Blocks;

use common\models\BlocksBanners;
use common\models\Property;
use common\models\Search\ProductsSearchArrayProvider;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\BlocksGroups;
use common\models\BlocksTypes;
use common\models\Blocks;
use common\models\News;
use common\components\Catalog;
use frontend\models\OrderForm;

class BlocksWidget extends Widget
{

  public $model;
  public $left;
  public $right;
  public $data = [];
  public $property_id = null;


  public function init()
  {

    switch ($this->model->block_type_id) {

//      case BlocksTypes::BLOCK_CATEGORY:
//
//        $blockGroup = BlocksGroups::findOne(['block_id' => $this->model->id]);
//        if (!empty($blockGroup->category)) {
//
//          $this->data = $blockGroup->category;
//        }
//
//        break;

      case BlocksTypes::BLOCK_CATEGORY_WITH_SUBCATEGORY:

//        $blockGroup = BlocksGroups::findOne(['block_id' => $this->model->id]);
//        if (!empty($blockGroup->category)) {
//
//          $this->data = $blockGroup->category;
//        }

        $catalog = new Catalog();
        $this->data = $catalog->getCatalog();

        break;

      case BlocksTypes::BLOCK_PRODUCTS_SALE:
      case BlocksTypes::BLOCK_PRODUCTS_NEW:
      case BlocksTypes::BLOCK_PRODUCTS_HOT:
      case BlocksTypes::BLOCK_PRODUCTS_BEST:

        if($this->property_id) {

          $searchModel = new ProductsSearchArrayProvider();
          $dataProvider = $searchModel->search(['property_id' => $this->property_id]);

          $this->data = $dataProvider->getModels();
        }
        break;

      default:

        $catalog = new Catalog();
        $this->data = $catalog->getCatalog();

        break;
    }

    parent::init();
  }

  public function run()
  {

    switch ($this->model->block_type_id) {

      case BlocksTypes::BLOCK_PRODUCTS_SALE:
      case BlocksTypes::BLOCK_PRODUCTS_NEW:
      case BlocksTypes::BLOCK_PRODUCTS_HOT:
      case BlocksTypes::BLOCK_PRODUCTS_BEST:

        $cartForm = new OrderForm();

        if($this->property_id) {

          $properties = new Property();
          $property = $properties::findOne(['id' => $this->property_id]);

          $searchModel = new ProductsSearchArrayProvider();
          $dataProvider = $searchModel->search(['property_id' => $this->property_id]);

          $this->data = $dataProvider->getModels();


          return $this->render('products_by_property', [
            'title' => $property->name,
            'model' => $this->model,
            'cartForm' => $cartForm,
            'data' => $this->data
          ]);
        }

        break;

      case BlocksTypes::BLOCK_NEWS_V1:

        $this->data = News::find()->orderBy('id DESC')->limit(2)->all();
        return $this->render('news_v1', [
          'model' => $this->model,
          'data' => $this->data??[],
          'displayCategory' => false
        ]);

        break;

      case BlocksTypes::BLOCK_NEWS_V2:

        return $this->render('news_v2', [
          'model' => $this->model,
          'data' => $this->data,
          'displayCategory' => false
        ]);

        break;

      case BlocksTypes::BLOCK_BANNERS_CAROUSEL:

        return $this->render('carousel', [
          'model' => $this->model->bannersCarousel
        ]);

        break;

      case BlocksTypes::BLOCK_BANNERS_LEFT:
      case BlocksTypes::BLOCK_BANNERS_RIGHT:

        return $this->render('banners', [
          'left' => $this->left,
          'right' => $this->right
        ]);
        break;

      case BlocksTypes::BLOCK_FEATURES:

        return $this->render('features');
        break;

      case BlocksTypes::BLOCK_CATEGORY_WITH_SUBCATEGORY:

        return $this->render('category_with_subcategory', [
          'model' => $this->model,
          'data' => $this->data
        ]);

        break;
    }


  }
}


