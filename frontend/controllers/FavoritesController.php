<?php

namespace frontend\controllers;

use common\models\Forms\OrderForm\OrderFormFactory;
use common\models\Products;
use common\models\Search\ProductsSearch;
use common\models\Search\ProductsSearchArrayProvider;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\UserFavorites;
use yii\base\Module;
use yii\web\NotFoundHttpException;

/**
 * Favorites controller
 */
class FavoritesController extends Controller
{

  public $bodyClass = 'index';
  public $loginFormModel;

  /**
   * @var Request
   */
  public $request;
  public $favorites;

  public function __construct(
    $id,
    Module $module,
    array $config = []
  )
  {

    $this->request = Yii::$app->request;
    $this->favorites = Yii::$app->favorites;
    parent::__construct($id, $module, $config);
  }

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
            'add',
            'index',
            'delete',
          ],
          'allow' => true,
        ],
      ],
    ];

    $behaviors['verbs'] = [
      'class' => VerbFilter::class,
      'actions' => [
        'index' => ['GET'],
        'add' => ['POST'],
        'delete' => ['GET'],
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

  public function actionDelete($id)
  {

    $product = [];
    if($id && $product = Products::findOne($id)) {

      if(Yii::$app->user->isGuest) {

        $this->favorites->remove($id);

      } else {

        $favorite = UserFavorites::findOne([
          'user_id' => Yii::$app->user->identity->id,
          'product_id' => $product->id
        ]);

        if($favorite) {
          $favorite->delete();
        }
      }
    }

    return $this->redirect(['/favorites']);

    return json_encode([
      'code' => 200,
      'status' => 'OK'
    ]);
  }

  public function actionAdd($product_id)
  {

    $product = [];
    $product = Products::findOne($product_id);

    if($product) {

      $this->favorites->add($product, 1);

      if(!Yii::$app->user->isGuest) {

        $favorite = new UserFavorites([
          'user_id' => Yii::$app->user->identity->id,
          'product_id' => $product->id
        ]);
        $favorite->save();
      }
    }

    return json_encode(ArrayHelper::toArray($product));
  }

  public function actionIndex()
  {

    $breadCrumbs = [];
    $breadCrumbs[] = [
      'url' => '',
      'name' => 'Избранное'
    ];

    if(Yii::$app->user->isGuest) {

      $favorites = $this->favorites->getItemIds();
      $products = new ProductsSearchArrayProvider();
      $products = $products->search(['productsIds' => $favorites]);

    } else {

      $this->favorites->clear();
      $favorites = UserFavorites::find()->select(['product_id'])->where(['user_id' => Yii::$app->user->identity->id])->indexBy('product_id')->asArray()->all();
      $products = new ProductsSearchArrayProvider();
      $products = $products->search(['productsIds' => array_keys($favorites)]);

      foreach ($products->getModels() as $product) {

        $this->favorites->add($product->id, 1);
      }
    }

    $cartForm = OrderFormFactory::get();
    return $this->render('index', [
      'favorites' => $products ? $products->getModels() : [],
      'breadCrumbs' => $breadCrumbs,
      'cartForm' => $cartForm
    ]);
  }

  private function findModel($id)
  {
    if (!$model = UserFavorites::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найдена позиция с id={id}', ['id' => $id]));
    }

    return $model;
  }
}
