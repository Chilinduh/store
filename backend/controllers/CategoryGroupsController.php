<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\CategoryGroups;

class CategoryGroupsController extends Controller
{

  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {

    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['login', 'error'],
            'allow' => true,
          ],
          [
            'actions' => ['index', 'update', 'create'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
          'update',
          'create',
        ],
      ],
    ];
  }


  public function actionUpdate($id)
  {

    $model = new CategoryGroups();
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

    $model = new CategoryGroups();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {



    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new CategoryGroups();
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

    $model = new CategoryGroups();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/category-groups');
  }

}
