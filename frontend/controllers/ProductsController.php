<?php

namespace frontend\controllers;

use common\models\Forms\Cart\CartFactory;
use common\models\LoginForm;
use common\models\Search\ProductsSearchArrayProvider;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\View;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Products;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class ProductsController extends Controller
{

  public $layout = "main";
  public $bodyClass = 'template-index';

  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {

    return [

      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout', 'signup'],
        'rules' => [
          [
            'actions' => ['signup'],
            'allow' => true,
            'roles' => ['?'],
          ],
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'index' => ['post', 'get'],
        ],
      ],
    ];
  }

  public function init()
  {
    parent::init();
    $this->bodyClass = 'template-collection';
  }

  /**
   * {@inheritdoc}
   */
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

  /**
   * Displays homepage.
   *
   * @return mixed
   */

  public function beforeRender()
  {

    return true;
  }

  public function actionWishList()
  {

    return $this->render('wish-list', [
    ]);


  }

  public function actionCompare()
  {

    return $this->render('compare', [
    ]);


  }

  public function actionWide()
  {

    $products = new Products();

    return $this->render('wide', [
      'model' => $products,
      'products' => $products->getAll()->all(),
      //'user'=> $user->find()->where(['id' => 1])->one()
    ]);

  }

  public function actionList()
  {

    return $this->renderPartial('list', [
    ]);

  }

  public function actionDetail()
  {

    $params = $this->request->queryParams;
    $searchModel = new ProductsSearchArrayProvider();
    $product = $searchModel->search($params ?? [], 'model');

    if($product) {
      $cart = isset($product['colors']) ? CartFactory::get(CartFactory::CART_EXTENDED) : CartFactory::get(CartFactory::CART);
      $cart->product_id = $product['id'];
    }

    return $this->renderAjax('detail', [
      'product' => $product,
      'cartForm' => $cart
    ]);
  }

  public function actionView()
  {

    $this->bodyClass = 'product';
    $this->layout = "main";

    //         $news = new News();
    $user = new User();
    $products = new Products();

    return $this->render('view', [
      'model' => $products,
      'products' => $products->getAll()->all(),
    ]);

  }

  public function actionIndex(int $id = null)
  {

    $params = $this->request->queryParams;
    $searchModel = new ProductsSearchArrayProvider();
    $dataProvider = $searchModel->search($params ?? []);

    if (Yii::$app->request->isAjax) {

      return json_encode($dataProvider->allModels[0]);
    }

    $this->layout = "main";
    $this->getView()->registerJs("window.page='" . \Yii::$app->controller->id . "';"
      //         $this->getView()->registerJs("window.yii=".\yii\helpers\Json::encode(\Yii::$app->controller->id).";"

      , View::POS_HEAD);

    //         $news = new News();
    $this->bodyClass = 'product';
    return $this->render('product', [

      //'user'=> $user->find()->where(['id' => 1])->one()
    ]);

  }

}
