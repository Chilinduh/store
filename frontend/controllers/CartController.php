<?php

namespace frontend\controllers;

use common\models\CartItems;
use common\models\Colors;
use common\models\LoginForm;
use common\models\Products;
use common\models\Search\ProductsSearchArrayProvider;
use common\models\Tree;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\filters\HttpCache;
use yii\web\Request;
use yii\helpers\ArrayHelper;
use common\models\Cart;
use common\models\UserProfile;
use frontend\models\OrderForm;

use lavrentiev\widgets\toastr\ToastrAsset;
use common\models\Forms\OrderForm\OrderFormFactory;
use common\models\Sizes;

use PHPMailer\PHPMailer\PHPMailer;

class CartController extends Controller
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
            'add',
            'index',
            'checkout',
            'update',
            'delete',
            'add-quantity',
            'sub-quantity',
          ],
          'allow' => true,
        ],
      ],
    ];

    $behaviors['verbs'] = [
      'class' => VerbFilter::class,
      'actions' => [
        'index' => ['GET'],
        'checkout' => ['GET'],
        'add' => ['POST'],
        'update' => ['PUT'],
        'delete' => ['DELETE'],
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

  //adding to cart
  public function actionAdd(int $id = null)
  {

    $params = Yii::$app->request->post();

    $searchModel = new ProductsSearchArrayProvider();
    $dataProvider = $searchModel->search($params ?? []);

    $product = $dataProvider->getModels()[0];

    $product = Yii::createObject(
      ArrayHelper::merge(
        [
          'class' => 'common\models\Products',
        ],
        $product
      )
    );

    $type = count($product->colors) ? OrderFormFactory::CART_EXTENDED : OrderFormFactory::CART;
    $cartForm = OrderFormFactory::get($type);

    if ($cartForm->load($params) && $cartForm->validate()) {

      if ($type == OrderFormFactory::CART_EXTENDED) {

      }

    } else {

      return json_encode($cartForm);
    }

    if (Yii::$app->user->isGuest) {

      Yii::$app->cart->add($product, 1);
    } else {

      $cart = Cart::getCart();
      if (!$cart) {
        $cart = new Cart([
          'user_id' => Yii::$app->user->identity->id
        ]);
        $cart->save();
      }

      //$cartItems = $cart->getCartItems();
      $cartItems = new CartItems([
        'cart_id' => $cart->id,
        'product_id' => $id,
        'quantity' => 1
      ]);

      if ($product && $cartItems->save()) {

        Yii::$app->cart->add($product, 1);
      }
    }

    return json_encode(
      ArrayHelper::merge(
        [
          'cartTotal' => Yii::$app->cart->getTotalCost(),
          'cartTotalCount' => Yii::$app->cart->getTotalCount()
        ],
        $product ?? []
      )
    );
  }

  //show cart
  public function actionIndex()
  {

    $searchModel = new ProductsSearchArrayProvider();

    $cart = [];
    foreach (Yii::$app->cart->getItems() as $item) {

      $dataProvider = $searchModel->search([
        'id' => $item->getId()
      ]);

      $product = $dataProvider->getModels();
      if($product = $product[0]??false) {
        $cart[] = ArrayHelper::merge(
          ['quantity' => $item->getQuantity()],
          ArrayHelper::toArray($product)
        );
      }

      

    }

    return $this->render('index', [
      'cart' => $cart,
      'total' => Yii::$app->cart->getTotalCost(),
// 			'total' => $total,
    ]);
  }

  public function actionAddQuantity(int $product_id = null)
  {

    $product = Yii::$app->cart->getItem($product_id);
    $product->setQuantity($product->getQuantity() + 1);
    return json_encode(ArrayHelper::toArray([
      'total' => $product->getQuantity() * $product->getPrice(),
      'quantity' => $product->getQuantity(),
      'cartTotal' => Yii::$app->cart->getTotalCost(),
      'cartTotalCount' => Yii::$app->cart->getTotalCount(),
    ]));
  }

  public function actionSubQuantity(int $product_id = null)
  {

    $product = Yii::$app->cart->getItem($product_id);
    if ($product->getQuantity() > 1) {

      $product->setQuantity($product->getQuantity() - 1);
    }

    return json_encode(ArrayHelper::toArray([
      'total' => $product->getQuantity() * $product->getPrice(),
      'quantity' => $product->getQuantity(),
      'cartTotal' => Yii::$app->cart->getTotalCost(),
      'cartTotalCount' => Yii::$app->cart->getTotalCount()
    ]));
  }

  //delete item
  public function actionDelete($product_id)
  {

    $product = Products::findOne($product_id);
    Yii::$app->cart->remove($product->id);

    return json_encode([
      'cartTotalCount' => Yii::$app->cart->getTotalCount(),
      'cartTotal' => Yii::$app->cart->getTotalCost(),
    ]);
  }

  public function actionOrderSend()
  {


  }

  public function actionCheckout()
  {

    $userProfile = new UserProfile();
    $orderForm = new OrderForm();

    $cart = [];
    foreach (Yii::$app->cart->getItems() as $item) {

      $product = Products::findOne($item->getId());

      $cart[] = array_merge(
        ArrayHelper::toArray($item),
        [
          'images' => $product->getFiles()->asArray()->all(),
          'parent' => $product->category_id,
          'product' => $item->getProduct(),
          'manufacturer' => $product->getManufacturer()->asArray()->one(),
          'brand' => $product->getBrand()->asArray()->one(),
          'quantity' => $item->getQuantity(),
        ]
      );
    }

    if (Yii::$app->request->isPost) {

      if ($orderForm->load(Yii::$app->request->post()) && $orderForm->validate()) {

        $order = new Orders([
          'user_id' => Yii::$app->user->identity->id
        ]);
        $order->save();
        $orderForm->sendEmail($order, Yii::$app->user->identity);

        return $this->render('order-success', [
          'order' => $orderForm,
          'cart' => ArrayHelper::toArray($cart),
          'total' => Yii::$app->cart->getTotalCost(),
        ]);
      }
    }

    if ($userProfile = $userProfile->getProfile()) {

      $orderForm->first_name = $userProfile->first_name;
      $orderForm->last_name = $userProfile->last_name;
      $orderForm->address = $userProfile->address;
      $orderForm->phone = $userProfile->phone;
      $orderForm->city = $userProfile->city;
      $orderForm->country = $userProfile->country;
    }

    return $this->render('checkout', [
      'orderForm' => $orderForm,
      'cart' => ArrayHelper::toArray($cart),
      'total' => Yii::$app->cart->getTotalCost(),
// 			'total' => $total,
    ]);

  }

  public function actionOrder()
  {

    $this->bodyClass = '';
// 		$model = new Order();

// 		$cart = Yii::$app->cart;
// 		$products = $cart->getPositions();
//         $total = $cart->getCost();

// 		if($model->load(Yii::$app->request->post()) && $model->save())
// 		{
// 			foreach($products as $product){
// 				$item = new OrderItem();
// 				$item->order_id = $model->id;
// 				$item->product_id = $product->getId();
// 				$item->price = $product->getPrice();
// 				$item->color = Yii::$app->session->get('item_'.$product->getId());
// 				$item->quantity = $product->getQuantity();

// 			    if($item->save()){
// 					Yii::$app->session->remove('item_'.$product->getId());
// 				}else{
// 					Yii::$app->session-addFlash('error', 'Error. Contact us, please.');
// 				}
// 			}
// 			$cart->removeAll();

// 			Yii::$app->session->addFlash('success', 'Thanks for your order. We will contact to you.');
// 			return $this->redirect(['//catalog/list']);

// 		}
// 		else
// 		{
// 			return $this->render('order', [
// 			    'model' => $model,
// 			    'products' => $products,
// 				'total' => $total,
// 			]);

// 		}

// 			return $this->render('order', [
// 			    'model' => $model,
// 			    'products' => $products,
// 				'total' => $total,
// 			]);

  }


}
