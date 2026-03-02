<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\RegisterForm;
use frontend\models\ContactForm;
use frontend\models\News;
use common\models\User;
use common\models\ChangePasswordForm;
use common\models\Cart;
use common\models\CartItems;
use common\models\Products;


/**
 * Site controller
 */
class AuthController extends Controller
{

  public $bodyClass = 'product';

  public function init()
  {
    parent::init();
    $this->bodyClass = 'index';
  }


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
          'logout' => ['get', 'post'],
          'login' => ['get', 'post'],
          'register' => ['get', 'post'],
          'reset-password' => ['get', 'post'],
        ],
      ],
    ];
  }

  public function actionRemember()
  {

    $this->bodyClass = '';
    return $this->render('resetPassword', [

    ]);
  }

  public function actionResetPassword(string $token = null)
  {

    try {
      $model = new ResetPasswordForm($token);
    } catch (InvalidArgumentException $e) {
      throw new BadRequestHttpException($e->getMessage());
    }

    if (Yii::$app->request->isPost) {

      $model = new ChangePasswordForm($token);

      if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
        Yii::$app->session->setFlash('success', 'Пароль обновлен');

        return $this->goHome();
      }
    }

    $this->bodyClass = '';
    return $this->render('resetPassword', [
      'model' => new ChangePasswordForm($token)
    ]);

  }

  /**
   * Requests password reset.
   *
   * @return mixed
   */
  public function actionRestore()
  {

    $model = new PasswordResetRequestForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {

      if ($model->sendEmail()) {
        Yii::$app->session->setFlash('success', 'На вашу почту выслан пароль');

        return $this->render('restore', [
          'model' => $model,
        ]);
      } else {
        Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
      }
    }

    return $this->render('restore', [
      'model' => $model,
    ]);
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
  public function actionIndex()
  {

    //         $news = new News();
    $user = new User();

    $model = new LoginForm();

    return $this->render('index', [

      'model' => $model
    ]);
  }

  /**
   * Logs in a user.
   *
   * @return mixed
   */
  public function actionLogin()
  {

    $this->bodyClass = '';
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();

    if ($model->load(Yii::$app->request->post()) && $model->login()) {

      if (Yii::$app->cart->getItems()) {

        $cart = Cart::findOne($model->id);
        if (!$cart) {

          $cart = new Cart(['user_id' => $model->id]);
          if ($cart->save()) {

            foreach (Yii::$app->cart->getItems() as $item) {

              $cartItems = new CartItems([
                'cart_id' => $cart->id,
                'product_id' => $item->getId(),
                'quantity' => $item->getQuantity()
              ]);
              $cartItems->save();
            }
          }
        } else {

          $cart = Cart::getCart();
          if ($cart && $cart->getCartItems()) {
            foreach ($cart->getCartItems()->all() as $item) {

              $product = Products::findOne($item->product_id);
              Yii::$app->cart->add($product, 1);
            }
          }
        }
      }

      return $this->goBack();

    } else {

      $model->password = '';

      return $this->render('login', [
        'model' => $model,
      ]);
    }

    return $this->render('login', []);
  }

  /**
   * Logs out the current user.
   *
   * @return mixed
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();
    Yii::$app->cart->clear();

    return $this->goHome();
  }

  /**
   * Displays contact page.
   *
   * @return mixed
   */
  public function actionContact()
  {
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
      } else {
        Yii::$app->session->setFlash('error', 'There was an error sending your message.');
      }

      return $this->refresh();
    } else {
      return $this->render('contact', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Displays about page.
   *
   * @return mixed
   */
  public function actionAbout()
  {
    return $this->render('about');
  }

  public function actionRegister()
  {

    $this->bodyClass = '';

    $model = new RegisterForm();
    if ($model->load(Yii::$app->request->post()) && $model->register()) {

      Yii::$app->session->setFlash('success', 'Спасибо за регистрацию. Вам на почту отправлена ссылка для подтверждения регистрация');
    }

    return $this->render('register', [
      'model' => $model,
    ]);
  }


  /**
   * Verify email address
   *
   * @param string $token
   * @return yii\web\Response
   * @throws BadRequestHttpException
   */
  public function actionVerifyEmail($token)
  {
    try {
      $model = new VerifyEmailForm($token);
    } catch (InvalidArgumentException $e) {
      throw new BadRequestHttpException($e->getMessage());
    }
    if ($user = $model->verifyEmail()) {
      if (Yii::$app->user->login($user)) {
        Yii::$app->session->setFlash('success', 'Ваш Email подтвержден!');
        return $this->goHome();
      }
    }

    Yii::$app->session->setFlash('error', 'Извините, Ваша ссылка не действительна!');
    return $this->goHome();
  }

  /**
   * Resend verification email
   *
   * @return mixed
   */
  public function actionResendVerificationEmail()
  {
    $model = new ResendVerificationEmailForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      if ($model->sendEmail()) {
        Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
        return $this->goHome();
      }
      Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
    }

    return $this->render('resendVerificationEmail', [
      'model' => $model,
    ]);
  }

  public function beforeAction($action)
  {

    if (in_array($action->id, ['login', 'resetPassword'])) {
      $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
  }

}
