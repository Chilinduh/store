<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\GoodStorage;
use common\models\Search\GoodRequestSearch;
use common\models\Search\GoodStorageSearch;
use yii\helpers\ArrayHelper;

class GoodStorageController extends Controller
{

  public function actionGoods()
  {

    if (Yii::$app->request->isAjax) {

      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $goodStorageSearch = new GoodStorageSearch();
      $goodStorageSearch = $goodStorageSearch->search(Yii::$app->request->queryParams);

      $goodStorageSearch = ArrayHelper::toArray($goodStorageSearch->getModels());
      return ['results' => $goodStorageSearch];
    }
  }
}
