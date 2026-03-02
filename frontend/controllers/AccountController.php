<?php
namespace frontend\controllers;

use common\Exceptions\ValidationErrorException;
use Yii;
use yii\web\Controller;
use yii\web\View;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Forms\UserProfileForm;
use common\models\UserProfile;
use common\models\Orders;
use common\models\Search\OrdersSearch;


/**
 * Site controller
 */
class AccountController extends Controller {

  public $layout = "main";
  public $bodyClass = 'template-index';

  public function init() {
    parent::init();
    $this->bodyClass = 'template-collection';
  }

  /**
   * {@inheritdoc}
   */
  public function actions() {

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

  public function beforeRender() {

    return true;
  }

  public function actionWishList() {

    return $this->render('wish-list',[
    ]);
  }

  public function actionTrackOrder() {

    return $this->render('track-order', [
    ]);
  }

  public function actionDashboard() {

    return $this->render('dashboard', [

    ]);
  }

  public function actionProfile() {

    $form = new UserProfileForm();
    $model = new UserProfile();

    if(!$model = $model->getProfile()) {
      $model = new UserProfile();
    }

    if (Yii::$app->request->isPost) {
      if (!$model->load(Yii::$app->request->bodyParams) || !$model->validate() || !$model->save(false)) {
      }

      $model->refresh();
    }

    return $this->render('profile',[

      'model' => $model

    ]);
  }


  public function actionDetails() {

    return $this->render('order-details',[

    ]);
  }

  public function actionOrders() {

    $orders = new OrdersSearch();
    $orders = $orders->search()->getModels();

    return $this->render('orders',[
      'orders' => $orders
    ]);
  }

  public function actionOrdersDetail(int $id) {

    $order = Orders::findOne($id);
    $profile = Yii::$app->user->identity->getProfile()->one();

    return $this->render('order-detail',[
      'order' => $order,
      'profile' => $profile,
      'orderItems' => $order->getOrderItems()->all()
    ]);
  }

  public function actionPassword() {

    return $this->render('password',[

    ]);
  }

  public function actionAddresses() {

    return $this->render('addresses',[

    ]);
  }


  public function actionLogin() {

    return $this->render('login',[

    ]);

  }


  public function actionIndex() {

    return $this->render('dashboard',[

    ]);

  }

}
