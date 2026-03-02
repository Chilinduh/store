<?php


namespace app\components;

use common\models\CargoOrders;
use common\models\Search\CargoRequestSearchArray;
use yii\base\Widget;
use yii\web\Controller;


class CargoOrdersService extends Controller {


  public static function getCarriers(CargoOrders $model, $params = []) {


    $searchModel = new CargoRequestSearchArray();
    $searchModel->pagination = 1000;
    $dataProvider = $searchModel->search($params);

    $allModels = [];

    foreach ($dataProvider->allModels as $item) {

      if(!isset($allModels[$item->carrier_id])) {

        $allModels[$item->carrier_id] = [];
      }

      $allModels[$item->carrier_id][] = $item;
    }

    $dataProvider->allModels = $allModels;

    return $dataProvider;
  }

}
