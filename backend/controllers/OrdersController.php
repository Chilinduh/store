<?php

namespace backend\controllers;

use common\models\OrderItems;
use common\models\Search\ProductsSearch;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Orders;
use common\models\Search\OrdersSearch;
use yii\helpers\ArrayHelper;

class OrdersController extends Controller
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

  public function actionProducts($id)
  {

    $order = new Orders();
    $order = $order->find()->where(['id' => $id])->one();
    $orderItems = OrderItems::find()->where(['order_id' => $order->id]);

    $dataProvider = new ActiveDataProvider([
      'query' => $orderItems,
      'pagination' => [
        'pageSize' => 45
      ],
      'sort' => ['attributes' => ['id','price', 'name','code']]
    ]);

    return $this->render('_order_products', [
      'order' => $order,
      'dataProvider' => $dataProvider,
      'searchModel' => new Orders(),
    ]);
  }

  public function actionUpdate($id)
  {

    $model = new Orders();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $model = new Products(); //reset model
    }

    return $this->render('_order', [
      'model' => $model,
      'order' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new Orders();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new OrdersSearch();
    $dataProvider = $searchModel->search();

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionDelete($id)
  {

    $model = new Orders();

    if ($model = $model->findOne($id)) {
      $model->delete(false);
    }

    return $this->redirect('/orders');
  }

}
