<?php

namespace frontend\controllers;

use common\models\Faq;
use common\models\ProductProperty;
use common\models\Search\ProductsSearchArrayProvider;
use frontend\models\ContactForm;
use frontend\models\OrderForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use common\models\Products;
use common\models\Tree;
use yii\helpers\Html;
use common\components\Catalog;
use common\Exceptions\ValidationErrorException;
use common\models\Property;
use common\models\Pages;
use frontend\components\CatalogHeader\CatalogHeaderWidget;

/**
 * Site controller
 */
class SiteController extends Controller
{

  public $bodyClass = 'index';
  public $loginFormModel;
  public $categories = [];
  public $catalog = [];

  public static function allowedDomains()
  {
    return [
      '*',
      'http://admin',
      'http://admin/user/update/1',
      'http://theme/',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {

    return [
      'corsFilter' => [
        'class' => \yii\filters\Cors::className(),
        'cors' => [
          // restrict access to domains:
          'Origin' => static::allowedDomains(),
          'Access-Control-Request-Method' => ['POST', 'GET', 'OPTIONS', 'DELETE'],
          'Access-Control-Allow-Credentials' => false,
          'Access-Control-Max-Age' => 3600,
          'Access-Control-Allow-Origin' => true,
        ],
      ],
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
          'logout' => ['post'],
          'contacts' => ['post','get'],
        ],
      ],
    ];
  }

  public function init()
  {

    CatalogHeaderWidget::widget();

    $this->loginFormModel = new LoginForm();
    $catalog = new Catalog();
    $this->bodyClass = 'index';
    $this->catalog = $catalog->getCatalog();

    parent::init();
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

  public function actionIndex()
  {

    Yii::$app->metaTags->register('main');
    $model = new LoginForm();
    $cartForm = new OrderForm();

    return $this->render('index', [
      'model' => $model,
//      'products' => $products,
//      'bestsellers' => $products,
      'cartForm' => $cartForm,
      'catalog' => $this->catalog
    ]);
  }

  public function actionAbout()
  {

    Yii::$app->metaTags->register('abount');
//
//
//    $data =
//      [[5, 2, 2, 3, 1, 'Категории товаров', '', 1, 'category', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [6, 2, 4, 5, 1, 'Товары', '', 1, 'products', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [7, 1, 2, 3, 1, 'Бренд', '', 1, 'brands', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [9, 4, 2, 3, 1, 'Заказы', '', 1, 'orders', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [10, 1, 6, 7, 1, 'Статусы заказов', '', 1, 'order-status', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [8, 1, 4, 5, 1, 'Меню', '', 1, 'menu', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [11, 1, 8, 9, 1, 'Цвета', '', 1, 'colors', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [4, 4, 1, 6, 0, 'Клиенты', '', 1, 'category', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [12, 4, 4, 5, 1, 'Пользователи', '', 1, 'user', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [13, 1, 10, 11, 1, 'Города', '', 1, 'city', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [14, 1, 12, 13, 1, 'Производители', '', 1, 'manufacturers', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [15, 1, 14, 15, 1, 'Поисковые слова', '', 1, 'search-words', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [16, 1, 16, 17, 1, 'Свойства товаров', '', 1, 'property', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [2, 2, 1, 8, 0, 'Каталог', '', 1, 'products', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [17, 2, 6, 7, 1, 'Товары на складе', '', 1, 'product-stock', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [18, 1, 18, 19, 1, 'Размеры', '', 1, 'sizes', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [23, 21, 4, 5, 1, 'Категории новостей', '', 1, 'news-category', true, true, false, false, false, true, false, true, true, true, true, false, true],
//        [22, 21, 1, 6, 0, 'Публикации', '', 1, '', true, true, false, false, true, true, false, true, true, true, true, false, true],
//        [24, 1, 20, 21, 1, 'Ключевые слова', '', 1, 'keywords', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [25, 3, 2, 3, 1, 'Страницы', '', 1, 'pages', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [27, 3, 6, 7, 1, 'Группы категорий', '', 1, 'category-groups', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [3, 3, 1, 10, 0, 'Настройки', '', 1, 'settings', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [28, 3, 8, 9, 1, 'Типы блоков', '', 1, 'blocks-types', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [26, 3, 4, 5, 1, 'Блоки', '', 1, 'blocks', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [21, 21, 2, 3, 1, 'Новости', '', 1, 'news', true, true, false, false, true, true, false, true, true, true, true, false, true],
//        [29, 1, 22, 23, 1, 'Группы', '', 1, 'groups', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [19, 4, 6, 7, 1, 'Заказы СДЕК', '', 1, 'orders-cdek', true, true, false, false, true, true, true, true, true, true, true, false, true],
//        [20, 1, 28, 29, 1, 'Единицы измерения', '', 1, 'units', true, true, false, false, true, true, false, true, true, true, true, false, true],
//        [1, 1, 1, 26, 0, 'Справочники', '', 1, '', true, false, false, false, true, false, true, true, true, true, true, false, true],
//        [30, 1, 24, 25, 1, 'Вопросы и ответы', '', 1, 'faq', true, false, false, false, true, false, true, true, true, true, true, false, true]
//      ];
//
//    echo '<pre>';
//    print_r($data);
//    echo '</pre>';
//    die;

    //Yii::$app->db->createCommand()->batchInsert('vpn_clients_vip_statuses', ['client_uuid', 'status'], $data)->execute();

    $page = Yii::$app->pages->get(Pages::PAGE_ABOUT);

    return $this->render('_blank', [
      'title' => $page->name,
      'content' => $page->text,
    ]);
  }

  public function actionDelivery()
  {

    Yii::$app->metaTags->register('delivery');

    $page = Yii::$app->pages->get(Pages::PAGE_DELIVERY);

    return $this->render('_blank', [
      'title' => $page->name,
      'content' => $page->text,
    ]);
  }

  public function actionTerms()
  {

    Yii::$app->metaTags->register('terms');
    $page = Yii::$app->pages->get(Pages::PAGE_TERMS);

    return $this->render('_blank', [
      'title' => $page->name,
      'content' => $page->text
    ]);
  }

  public function actionList()
  {

    $user = new User();
    $products = new Products();
    $model = new LoginForm();

    return $this->render('catalog', [
      'model' => $model,
      'products' => $products->getAll()->all(),
      //'user'=> $user->find()->where(['id' => 1])->one()
    ]);
  }

  public function actionFaqs()
  {

    $faq = new Faq();
    $faq = $faq->find()->all();

    return $this->render('faqs', [
      'model' => $faq
    ]);
  }

  public function actionContacts()
  {

    $params = Yii::$app->request->bodyParams;
    $model = new ContactForm();
    $send = false;

    if(Yii::$app->request->isPost) {

      if (!empty($params) && $model->load($params) && $model->validate()) {

        if($model->sendEmail()) {

          $send = true;
        }
      }
    }

    return $this->render('contacts', [
      'model' => $model,
      'content' => Yii::$app->pages->getContent(Pages::PAGE_CONTACTS),
      'send' => $send
    ]);
  }

  public function beforeAction($action)
  {

    if (in_array($action->id, ['contacts'])) {
      $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
  }

}
