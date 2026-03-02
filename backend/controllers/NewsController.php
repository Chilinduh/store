<?php

namespace backend\controllers;

use common\models\Files;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\News;
use yii\web\UploadedFile;

class NewsController extends Controller
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


    $model = new News();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post())) {

//      $path = \Yii::getAlias('@newsImages') . '/' . $model->id;
//      $image = UploadedFile::getInstance($model, 'file');
//
//      if (!is_dir($path)) {
//
//        mkdir($path);
//      }
//      $path_to_save = $path . '/' . $image->name;
//      //$file_name = $model->id.'_'.uniqid();
//      $image->saveAs($path_to_save);


      $files = $model->getFiles()->all();
      if ($model->save() && isset( $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file']) && !empty($_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'])) {

        if($files) {
          foreach ($files as $file) {

            $file->delete();
          }
        }

        $files = new Files();
        $path = \Yii::getAlias('@newsImages') . '/' . $model->id;
        $path_to_save = '/images/' . Yii::$app->controller->id . '/' . $model->id;
        $file_path = $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'];

        if(!empty($file_path)) {

          $files->saveFiles([
            'table_name' => Yii::$app->controller->id,
            'table_id' => $model->id,
            'file_path' => $file_path,
            'file_name' => ucfirst(Yii::$app->controller->id) . '[file]',
//        'file_name' => $_FILES[ucfirst(Yii::$app->controller->id)]['name']['file'][0],
            'path' => $path,
            'path_to_save' => $path_to_save,
          ], ['width' => 250, 'height' => 250]);
        }
      }
    }

    return $this->render('_form', [
      'model' => $model,
      'files' => $model->getFiles()->all(),
    ]);
  }

  public function actionCreate()
  {

    $model = new News();
    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      return $this->redirect('/news/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new News();
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

    $model = new News();
    $model = $model->find()->where(['id' => $id])->one();
    if ($model) {

      $model->delete();
    }

    return $this->actionIndex();
  }

}
