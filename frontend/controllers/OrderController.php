<?php

namespace frontend\controllers;


use common\models\CartItems;
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
use common\models\Orders;
use common\models\OrderItems;
use common\models\OrdersCdek;
use common\models\OrderStatus;

use lavrentiev\widgets\toastr\ToastrAsset;

class OrderController extends Controller
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
            'delivery-points',
            'delivery-tariffs',
            'delete',
          ],
          'allow' => true,
        ],
      ],
    ];

    $behaviors['verbs'] = [
      'class' => VerbFilter::class,
      'actions' => [
        'index' => ['GET', 'POST'],
        'success' => ['GET'],
        'delivery-points' => ['POST'],
        'delivery-tariffs' => ['POST'],
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

  public function getDeliveryPoints($city_code = '')
  {

    $api = Yii::$app->cdek;
    $api->token();

    $points = $api->getDeliveryPoints([
      'city_code' => $city_code
    ]);

    $data = [];
    foreach ($points as $point) {

      if ($point['is_handout']) {

        $data[] = [
          'id' => $point['code'],
          'name' => $point['location']['address']
        ];
      }
    }

    return json_encode(['output' => $data, 'selected' => '']);
  }

  public function actionDeliveryPoints()
  {

    $params = Yii::$app->request->post();

    if (isset($params['depdrop_parents'][0])) {

      return $this->getDeliveryPoints($params['depdrop_parents'][0]);
    }

    return json_encode(['output' => [], 'selected' => '']);
  }


  public function actionDeliveryTariffs()
  {

    $userProfile = new UserProfile();
    $orderForm = new OrderForm();

    $api = Yii::$app->cdek;
    $token = $api->token();

    if (Yii::$app->request->isPost) {

      if ($orderForm->load(Yii::$app->request->getBodyParams()) && $orderForm->validate()) {

        $points = $api->getDeliveryPoints([
          'city_code' => $orderForm->city_id
        ]);

        $deliveryPoint = [];
        foreach ($points as $point) {

          if ($point['code'] == $orderForm->point_id) {

            $deliveryPoint = $point;
          }
        }

        $deliveryInfo = [
          "type" => 1,
          "date" => "2020-11-03T11:49:32+0700",
          "currency" => 1,
          "tariff_code" => 137,
          "lang" => "rus",
          'from_location' => [
            'code' => 44,
            'postal_code' => '127566',
            'country_code' => 'RU',
            'city' => 'Москва',
            'address' => 'Россия, Москва, Москва, ул. Римского-Корсакова, 8, под.8'
          ],
          'to_location' => [
            'code' => $deliveryPoint['city_code'],
            'postal_code' => $deliveryPoint['location']['postal_code'],
            'country_code' => $deliveryPoint['location']['country_code'],
            'city' => $deliveryPoint['location']['city'],
            'address' => $deliveryPoint['location']['address_full']
          ],
          'packages' => [
            'weight' => 500,
            'length' => 10,
            'width' => 35,
            'height' => 35,
          ]
        ];

        $tariffList = $api->getTariffList($deliveryInfo);

        $data = [];
        foreach ($tariffList['tariff_codes'] as $item) {

          $deliveryInfo['traffic_code'] = $item['delivery_mode'];

          $tariff = $api->getTariff($deliveryInfo);
          $data[] = [
            'info' => $item,
            'tariff' => $tariff
          ];
        }

        return json_encode($data);

        return $this->render('success', [
          'order' => $order,
          'cart' => ArrayHelper::toArray($cart),
          'total' => Yii::$app->cart->getTotalCost(),
        ]);
      }
    }

  }

  public function actionIndex()
  {

    $userProfile = new UserProfile();
    $orderForm = new OrderForm();
    $orderItems = new OrderItems();

    if(Yii::$app->params['cdek']) {
      $api = Yii::$app->cdek;
      $token = $api->token();
    }
    

    $searchModel = new ProductsSearchArrayProvider();

    $cart = [];
    foreach (Yii::$app->cart->getItems() as $item) {

      $dataProvider = $searchModel->search([
        'id' => $item->getId()
      ]);
      $product = $dataProvider->getModels();
      $cart[] = ArrayHelper::merge(
        ['quantity' => $item->getQuantity()],
        ArrayHelper::toArray($product[0]??[])
      );
    }

    if (Yii::$app->request->isPost && Yii::$app->cart->getTotalCount()) {

      if ($orderForm->load(Yii::$app->request->post())) {

        if($orderForm->validate()) {

          $order = new Orders([
            'user_id' => Yii::$app->user->identity->id,
            'status_id' => OrderStatus::STATUS_ACTIVE,
            'price' => Yii::$app->cart->getTotalCost(),
            'comment' => $orderForm->comment
          ]);
          $order->save();
          $order->refresh();

          foreach (Yii::$app->cart->getItems() as $item) {

            $orderItems = new OrderItems([
              'product_id' => $item->getId(),
              'order_id' => $order->id,
              'quantity' => $item->getQuantity()
            ]);
            $orderItems->save();
          }

          if(Yii::$app->params['cdek']) {

            $orderCdek = new OrdersCdek([
              'order_id' => $order->id,
              'city_id' => $orderForm->city_id,
              'point_id' => $orderForm->point_id,
              'tariff_id' => $orderForm->tariff,
              'tariff_sum' => $orderForm->tariff_sum
            ]);
            $orderCdek->save();
          }

          $orderInfo = [
            'cart' => ArrayHelper::toArray($cart),
            'total' => Yii::$app->cart->getTotalCost(),
            'count' => Yii::$app->cart->getTotalCount(),
            'order' => $order
          ];

          $orderForm->sendOrderToEmail($order, Yii::$app->user->identity??false);
          return $this->render('success', $orderInfo);
        }
      }
    }

    if (!Yii::$app->user->isGuest) {

      $userProfile = $userProfile->getProfile();
      $orderForm->first_name = $userProfile->first_name??'';
      $orderForm->last_name = $userProfile->last_name??'';
      $orderForm->address = $userProfile->address??'';
      $orderForm->phone = $userProfile->phone??'';
      $orderForm->city = $userProfile->city??'';
      $orderForm->country = $userProfile->country??'';
    }

    return $this->render('index', [
      'orderForm' => $orderForm,
      //'cities' => ArrayHelper::map($api->getDeliveryCities([]), 'code', 'city'),
      'cart' => ArrayHelper::toArray($cart),
      'cdek' => Yii::$app->params['cdek'],
      'total' => Yii::$app->cart->getTotalCost(),
// 			'total' => $total,
    ]);
  }

}
