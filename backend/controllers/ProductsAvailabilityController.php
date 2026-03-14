<?php

namespace backend\controllers;
use common\models\ProductsAvailability;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class ProductsAvailabilityController extends Controller
{

  public function actionUpdate($id)
  {

    $model = new ProductsAvailability();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new ProductsAvailability();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

      return $this->redirect('/products-availability/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new ProductsAvailability();
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

    $model = new ProductsAvailability();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/products-availability');
  }

}
