<?php

namespace backend\controllers;

use common\models\Files;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Brands;

class BrandsController extends Controller
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

    $model = new Brands();
    $files = new Files();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

      if ($_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']??false) {

        $path = \Yii::getAlias('@brandsImages') . '/' . $model->id;
        $path_to_save = '/images/' . Yii::$app->controller->id . '/' . $model->id;
        $file_path = $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'];

        if(!empty($file_path)) {
          $files->saveFiles([
            'table_name' => Yii::$app->controller->id,
            'table_id' => $model->id,
            'file_path' => $file_path,
            'file_name' => ucfirst(Yii::$app->controller->id) . '[file]',
            'path' => $path,
            'path_to_save' => $path_to_save,
            'replace' => true
          ], ['width' => 100, 'height' => 100]);
        }


      }
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new Brands();
    $files = new Files();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

        if ($_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']??false  && !empty($_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'])) {

          $path = \Yii::getAlias('@brandsImages') . '/' . $model->id;
          $path_to_save = '/images/' . Yii::$app->controller->id . '/' . $model->id;
          $file_path = $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'];
          if(!empty($file_path)) {
            $files->saveFiles([
              'table_name' => Yii::$app->controller->id,
              'table_id' => $model->id,
              'file_path' => $file_path,
              'file_name' => ucfirst(Yii::$app->controller->id) . '[file]',
              'path' => $path,
              'path_to_save' => $path_to_save,
              'replace' => true
            ], ['width' => 100, 'height' => 100]);
          }
        }
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new Brands();
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

    $model = new Brands();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/brands');
  }

}
