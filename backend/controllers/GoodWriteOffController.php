<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\GoodWriteOff;
use common\models\GoodStorage;
use common\components\SimpleXLSX;
use common\models\Search\GoodWriteOffSearch;
use common\models\Search\GoodStorageSearch;
use yii\db\Expression;

class GoodWriteOffController extends Controller
{

  public function actionUpdate($id)
  {

    $model = new GoodWriteOff();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_edit', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new GoodWriteOff();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

      return $this->redirect('/pages/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }


  public function actionCount($id)
  {

    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    if (Yii::$app->request->isAjax) {

      $params = Yii::$app->request->post();
      if ($model = $this->findModel($id)) {

        $model->count = $params['count'];
        $model->save();
      }
    }
  }

  public function actionStatus($id)
  {

    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    if (Yii::$app->request->isAjax) {

      if ($model = $this->findModel($id)) {

        $model->good_request_status_id = 2;
        $model->save();
      }
    }
  }

  public function actionAddRequest()
  {

    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    if (Yii::$app->request->isAjax) {

      $goodStorageSearch = new GoodStorageSearch();
      $goodStorageSearch = $goodStorageSearch->search(Yii::$app->request->post());
      $models = $goodStorageSearch->getModels();

      $params = Yii::$app->request->post();

      $goodRequest = new GoodWriteOff([
        'name' => $models[0]['name']??$params['code'],
        'code' => $models[0]['code']??'',
        'good_write_off_status_id' => 1,
        'count' => $params['count']
      ]);
      $goodRequest->save();

      return ArrayHelper::toArray($models);
    }
    die;
  }

  public function actionIndex()
  {

    $goodStorage = new GoodStorage();
    $goodRequestSearch = new GoodWriteOffSearch();
    $goodStorageSearch = new GoodStorageSearch();

    $goodsRequestDataProvider = $goodRequestSearch->search();
    $goodStorageDataProvider = $goodStorageSearch->search();

    $data = [
      'goodRequestSearch' => $goodRequestSearch,
      'goodStorageSearch' => $goodStorageSearch,
      'goodRequest' => $goodsRequestDataProvider,
      'goodStorage' => $goodStorageDataProvider,
    ];

    if (Yii::$app->request->isAjax) {

      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      return $this->renderAjax('index', $data);
    }

    return $this->render('index', $data);
  }

  public function actionDelete($id)
  {

    if ($model = $this->findModel($id)) {
      $model->delete(false);
    }
    return $this->redirect('/good-write-off');
  }


  protected function findModel($id): GoodWriteOff
  {
    if (!$model = GoodWriteOff::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден id={id}', ['id' => $id]));
    }

    return $model;
  }

}
