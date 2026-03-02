<?php

namespace backend\controllers;

use common\models\Search\ProductsSearch;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\ProductStockBalance;
use common\models\Search\ProductStockBalanceSearch;
use yii\helpers\ArrayHelper;

class ProductStockController extends Controller
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

    $model = new ProductStockBalance();
    $model = $model->find()->where(['id' => $id])->one();
    $productsIds = $model->getProducts()->all();

    $searchModel = new ProductsSearch();
    $dataProvider = $searchModel->search([
      'productsIds' => ArrayHelper::map($productsIds, 'id', 'id')
    ]);

    return $this->render('_order_products', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionUpdate($id)
  {

    $model = new ProductStockBalance();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new ProductStockBalance();
    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

      return $this->redirect(['/product-stock/' . $model->id]);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new ProductStockBalanceSearch();
    $dataProvider = $searchModel->search();

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionDelete($id)
  {

    $model = new ProductStockBalance();

    if ($model = $model->findOne($id)) {
      $model->delete(false);
    }

    return $this->redirect('/product-stock');
  }

}
