<?php

namespace backend\controllers;

use common\Exceptions\ValidationErrorException;
use common\models\Products;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\Search\CategorySearch;
use yii\base\Module;

class CategoryController extends Controller
{

  public $cart = null;

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
            'actions' => ['index', 'update', 'update'],
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

  public function init()
  {
    $product = Products::findOne(26);

    $this->cart = Yii::$app->cart;
//    $this->cart->add($product, 1);
    //https://www.yiiframework.com/extension/devanych/yii2-cart
    parent::init();
  }

  public function actionCreate(int $id = null)
  {

    $model = new Category();
    $category = new Category();

    if ($model->load($this->request->post())) {
      $model->save(false);
      $model = new Category(); //reset model
    } else {

      $category = $this->findModel($id);
      $model->parent_id = $category->id;
    }

    return $this->render('_create', [
      'category' => $category,
      'model' => $model
    ]);
  }

  public function actionDelete($id)
  {

    $model = new Category();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/category');
  }

  /**
   * @param int $id
   *
   * @throws NotFoundHttpException
   */
  public function actionUpdate($id)
  {

    $model = $this->findModel($id);

    if (Yii::$app->request->isPost) {
      if (!$model->load(Yii::$app->request->bodyParams) || !$model->validate() || !$model->save(false)) {
        throw ValidationErrorException::create($model->errors, Yii::t('app', 'Ошибка обновления'));
      }

      $model->refresh();
    }

    return $this->render('_update', [
      'model' => $model,
    ]);
  }

  private function findModel($id)
  {
    if (!$model = Category::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден заказ с id={id}', ['id' => $id]));
    }

    return $model;
  }

  public function actionIndex()
  {

    $model = null;
    if ($parent_id = Yii::$app->request->get('parent_id')) {
      $model = $this->findModel($parent_id);
    }

    $searchModel = new CategorySearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      'total' => $total ?? [],
      'model' => $model
    ]);

  }
}
