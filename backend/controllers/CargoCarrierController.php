<?php

namespace backend\controllers;

use app\components\CargoOrdersService;
use common\models\CargoOrders;
use common\models\Search\CargoRequestSearchArray;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\CargoCarrier;

class CargoCarrierController extends Controller
{

  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  public function actionUpdate($id)
  {

    $model = new CargoCarrier();
    $model = $model->find()->where(['id' => $id])->one();
    $searchModel = new CargoRequestSearchArray();
    $searchModel->pagination = 30;

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    $dataProvider = CargoordersService::getCarriers(new CargoOrders(), [
      'carrier_id' => $id
    ]);


    return $this->render('_form', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel
    ]);
  }

  public function actionCreate()
  {

    $model = new CargoCarrier();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new CargoCarrier();
    $query = $searchModel->find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionDelete($id)
  {

    $model = new CargoCarrier();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/brands');
  }

}
