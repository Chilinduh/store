<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\GoodRequest;
use common\models\GoodStorage;
use common\components\SimpleXLSX;
use common\models\Search\GoodRequestSearch;
use common\models\Search\GoodStorageSearch;
use yii\db\Expression;

class GoodRequestController extends Controller
{

  public function actionUpdate($id)
  {

    $model = new GoodRequest();
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

    $model = new GoodRequest();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

      return $this->redirect('/pages/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionUpload()
  {

    if (Yii::$app->request->isPost) {

      if (isset($_FILES['file']['tmp_name'])) {

        $path = 'uploads/' . uniqid() . '.xls';
        copy($_FILES['file']['tmp_name'], $path);

        $data = [];
        if ($xls = SimpleXLSX::parse($path)) {

          Yii::$app->db->createCommand()->truncateTable('good_storage')->execute();
          foreach ($xls->rows() as $item) {


            $item[1] = str_replace('?', '', $item[1]);
            $data[] = [
              'code' => trim($item[0]),
              'name' => preg_replace('/\s+/u', ' ', $item[1])
            ];
          }

          //$data = array_slice($data, 11000, 31000);

          if (count($data)) {

            Yii::$app->db->createCommand()->batchInsert('good_storage', ['code', 'name'], $data)->execute();
          }
        } else {

          echo SimpleXLSX::parseError();

        }
      }
    }

    return $this->redirect('/good-request');
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
        $goodRequest = GoodRequest::find()->where([
          'code' => $params['code']
        ])->one();

        if($goodRequest) {

          //$goodRequest->count += $params['count'];
          $goodRequest->updated_at = new Expression('NOW()');

        } else {

          $goodRequest = new GoodRequest([
            'name' => $models[0]['name']??$params['code'],
            'code' => $models[0]['code']??'',
            'count' => $params['count'],
            'good_request_status_id' => 1
          ]);
        }
        $goodRequest->save();

      return ArrayHelper::toArray($models);
    }
    die;
  }

  public function actionIndex()
  {

    $goodRequestSearch = new GoodRequestSearch();
    $goodStorageSearch = new GoodStorageSearch();

    $goodsRequestDataProvider = $goodRequestSearch->search(Yii::$app->request->isPost ? Yii::$app->request->post() : Yii::$app->request->queryParams);
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

    return 'OK';
    //return $this->redirect('/good-request');
  }


  protected function findModel($id): GoodRequest
  {
    if (!$model = GoodRequest::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден id={id}', ['id' => $id]));
    }

    return $model;
  }

}
