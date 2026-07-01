<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Feeds;
use common\models\FeedsTypes;
use common\models\FeedsItems;

class FeedsController extends Controller
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

    $model = new Feeds();
    $model = $model->find()->where(['id' => $id])->one();

    $feedsItems = FeedsItems::find()->select(['product_id'])->where(['feed_id' => $id])->all();

    foreach($feedsItems as $item) {

        $feedsItemsIds[] = $item->product_id;
    }

    $model->product_id = $feedsItemsIds;

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

        FeedsItems::deleteAll(['feed_id' => $id]);
        foreach($model->product_id as $key=>$item) {
           
            $feedsItems = new FeedsItems([
                'product_id' => $item,
                'feed_id' => $model->id
            ]);
            $feedsItems->save();
        }
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new Feeds();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {


        foreach($model->product_id as $key=>$item) {

            $feedsItems = new FeedsItems([
                'product_id' => $item,
                'feed_id' => $model->id
            ]);

            $feedsItems->save();
        }

      return $this->redirect('/feeds/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new Feeds();
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

    $model = new Feeds();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/feeds');
  }

}
