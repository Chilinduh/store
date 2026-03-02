<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\AttributesGroups;
use common\models\ProductAttributes;

class AttributesGroupsController extends Controller
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

  public function actionProductAttributes($id)
  {


    $productAttributesModel = new ProductAttributes();

    if ($productAttributesModel->load(Yii::$app->request->post()) && $productAttributesModel->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->redirect('/attributes-groups/'.$id);
  }

  public function actionUpdate($id)
  {

    $model = new AttributesGroups();
    $productAttributesModel = new ProductAttributes();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    $searchModel = new ProductAttributes();
    $query = $searchModel->find()->where(['attribute_group_id' => $id]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('_form', [
      'model' => $model,
      'productAttributesModel' => $productAttributesModel,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionCreate()
  {

    $model = new AttributesGroups();
    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

      return $this->redirect('/attributes-groups/'.$model->id);
    }

    return $this->render('_form', [
      'model' => $model,
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new AttributesGroups();
    $query = $searchModel->find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'sort' => [
        'defaultOrder' => [
            'id' => SORT_DESC, // Sort by 'id' in descending order
        ],
      ],
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }


  public function actionAttributeDelete($attribute_group_id, $id)
  {

    $model = new ProductAttributes();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/attributes-groups/'.$attribute_group_id);
  }

  public function actionDelete($id)
  {

    $model = new AttributesGroups();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/brands');
  }

}
