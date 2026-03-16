<?php

namespace backend\controllers;

use common\models\Files;
use common\models\Ingredients;
use common\models\BlocksBanners;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Blocks;

class BlocksBannersController extends Controller
{

  public function actionUpdate($id)
  {

    $model = $this->findModel($id);

    $files = new Files();

    if (Yii::$app->request->isPost) {

      if ($id && $model->load(Yii::$app->request->post())) {
        if ($model->save(false) && $_FILES) {

          $path = \Yii::getAlias('@bannersImages') . '/' . $model->id;
          $path_to_save = '/images/banners/' . $model->id;
          $file_path = $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'];

          $files->saveFiles([
            'table_name' => Yii::$app->controller->id,
            'table_id' => $model->id,
            'file_path' => $file_path,
            'file_name' => ucfirst(Yii::$app->controller->id) . '[file]',
            'path' => $path,
            'path_to_save' => $path_to_save,
          ], ['width' => 100, 'height' => 100]);

        }
      }
    }

    return $this->redirect('/blocks/' . $id);
  }

  public function actionCreate()
  {

    $model = new Blocks();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {


    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new Blocks();
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

    $model = new Blocks();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/blocks');
  }


  private function findModel($id)
  {

    if (!$model = BlocksBanners::find()->where(['block_id' => $id])) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден блок с id={id}', ['id' => $id]));
    }

    return $model;
  }

}
