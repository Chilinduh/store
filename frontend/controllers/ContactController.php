<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\View;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class ContactController extends Controller {

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

  public function actionIndex() {

    return $this->render('dashboard',[
      'form' => new ContactForm()
    ]);
  }

}
