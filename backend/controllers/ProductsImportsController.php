<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\ProductsImports;

class ProductsImportsController extends Controller
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

    $model = new ProductsImports();
    $model = $model->find()->where(['id' => $id])->one();

    $dataProvider = new ActiveDataProvider([
      'query' => $model->productsImportsData,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('_form', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionCreate()
  {

    $model = new ProductsImports();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
        return $this->redirect('/products-imports/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new ProductsImports();
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

    $model = new ProductsImports();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/products-imports');
  }

}
