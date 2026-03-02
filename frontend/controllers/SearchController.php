<?php

namespace frontend\controllers;

use common\components\Catalog;
use common\models\Forms\OrderForm\OrderFormFactory;
use common\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\filters\HttpCache;
use yii\web\Request;
use common\models\UserProfile;
use common\models\SearchWords;
use frontend\models\OrderForm;
use common\models\Search\ProductsSearch;
use common\models\Search\ProductsSearchArrayProvider;

class SearchController extends Controller
{

  public $layout = "main";
  public $bodyClass = 'template-index';
  public $loginFormModel;
  public $categories = [];

  public function beforeAction($action)
  {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
  }

  /**
   * {@inheritdoc}
   */
  public function behaviors(): array
  {

    $behaviors = parent::behaviors();
    $behaviors['access'] = [
      'class' => AccessControl::class,
      'rules' => [
        [
          'actions' => [
            'index',
            'success',
            'update',
            'delete',
          ],
          'allow' => true,
        ],
      ],
    ];

    $behaviors['verbs'] = [
      'class' => VerbFilter::class,
      'actions' => [
        'index' => ['POST', 'GET'],
      ],
    ];

    return $behaviors;
  }

  public function init()
  {
    $this->loginFormModel = new LoginForm();
    $this->bodyClass = 'index';

    parent::init();
  }

  public function actionIndex()
  {

    $params = Yii::$app->request->queryParams;
    $catalogComponent = new Catalog();
    $breadCrumbs = $catalogComponent->getCatalogBreadCrumbs();
    $products = [];

    if(isset($params['search']) && !empty($params['search'])) {

      $searchWords = new SearchWords([
        'ip' => Yii::$app->request->userIP,
        'word' => strip_tags($params['search']),
        'user_id' => Yii::$app->user->identity->id??''
      ]);

      $searchWords->save();

      $searchModel = new ProductsSearchArrayProvider();
      $dataProvider = $searchModel->search($params ?? []);
      $products = $dataProvider->getModels();

    }

    $cartForm = OrderFormFactory::get();

    return $this->render('index', [
      'products' => $products,
      'breadCrumbs' => $breadCrumbs,
      'search' => $params['search']??'',
      'cartForm' => $cartForm
    ]);
  }
}
