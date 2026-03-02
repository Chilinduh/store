<?php

namespace backend\controllers;

use common\models\CargoDbAuthor;
use common\models\CargoDbLogist;
use common\models\CargoDbOrders;
use common\models\CargoDbSuborders;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;


use common\models\Search\CargoDbOrdersSearch;


class CargoDbOrdersController extends Controller
{

  public function actionIndex()
  {

    $params = $this->request->queryParams;

    $searchModel = new CargoDbOrdersSearch();
    $dataProvider = $searchModel->search($params ?? []);

    $data = [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ];

    return $this->render('index', $data);
  }

}
