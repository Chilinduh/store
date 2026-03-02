<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Products;
use yii\data\ActiveDataProvider;
use backend\models\Menu;

class MenuController extends Controller
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

    $model = new Menu();
    $data = $model->getMenu();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model,
      'data' => $data
    ]);
  }

  public function actionCreate()
  {

    $model = new Menu();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    return $this->render('index');
  }

  public function actionDelete($id)
  {

    $model = new Menu();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/menu');
  }

}
