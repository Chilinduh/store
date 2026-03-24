<?php
namespace frontend\controllers;

use common\models\NewsCategory;
use common\models\Search\NewsSearch;
use Yii;
use yii\web\Controller;
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;
use common\models\News;

/**
 * Site controller
 */
class NewsController extends Controller {

  public $layout = "main";
  public $bodyClass = 'template-index';

  public function init() {
    parent::init();
    $this->bodyClass = 'template-collection';
    Yii::$app->metaTags->register('news');
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

  public function actionView($category_id, $id) {

    if($model = $this->findModel($id)) {

      $categories = NewsCategory::find()->all();
      $category = NewsCategory::findOne($category_id);

      $breadCrumbs = [];
      $breadCrumbs[] = [
        'url' => '/news',
        'name' => 'Новости'
      ];

      $breadCrumbs[] = [
        'url' => '/news/'.$category->id,
        'name' => $category->name
      ];

      return $this->render('view', [
        'breadCrumbs' => $breadCrumbs,
        'categories' => $categories,
        'category' => $category,
        'model' => $model,
        'images' => $model->getFiles()->one()
      ]);
    }

    return $this->redirect(['/news']);
  }

  public function actionIndex($category_id = null) {

    $categories = NewsCategory::find()->all();

    $news = new NewsSearch();
    $news = $news->search(Yii::$app->request->queryParams);

    $breadCrumbs = [];
    $breadCrumbs[] = [
      'url' => '',
      'name' => 'Новости'
    ];

    if($category_id) {

      $category = NewsCategory::findOne($category_id);
      $breadCrumbs[] = [
        'url' => '/news/'.$category->id,
        'name' => $category->name
      ];
    }

    return $this->render('index',[
      'breadCrumbs' => $breadCrumbs,
      'categories' => $categories,
      'news' => $news->getModels(),
    ]);
  }

  private function findModel($id)
  {

    if (!$model = News::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найдена новость с id={id}', ['id' => $id]));
    }

    return $model;
  }


}
