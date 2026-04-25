<?php

namespace backend\controllers;

use common\models\Products;
use common\models\ProductsImportsPages;
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

  public function actionLinks($id)
  {

    $model = new ProductsImportsPages();
    $searchModel = new ProductsImportsPages();
    $model = $model->find()->where(['id' => $id])->one();

    $query = ProductsImportsPages::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('links', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionUpdate($id)
  {

    $model = new ProductsImports();
    $searchModel = new ProductsImports();
    $model = $model->find()->where(['id' => $id])->one();

    $query = Products::find()
      ->leftJoin('products_imports_data pi', 'pi.product_id = products.id')
      ->andWhere(['pi.product_import_id' => $model->id]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('update', [
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
