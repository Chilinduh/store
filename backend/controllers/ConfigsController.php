<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 12.09.19
 * Time: 19:30
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\City;
use common\models\Configs;
use common\models\Stocks;

use  yii\web\Session;

/**
 * Site controller
 */
class ConfigsController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors() {

    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['login', 'error'],
            'allow' => true,
          ],
          [
            'actions' => ['index'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionIndex() {

    $model = new Configs();


    $settings = Configs::find()->where(['user_id' => Yii::$app->user->id])->one();

    return $this->render('index',[
      'model' => $settings ? $settings : $model
    ]);
  }

  public function actionCity() {

    $model = new Configs();

    $settings = Configs::find()->where(['user_id' => Yii::$app->user->id])->one();
    $data = Yii::$app->request->post();

    if($settings && $settings->load($data)) {
      $model = $settings;
    } else {
      $model->load($data);
    }

    $model->save(false);

    $session = new Session;
    $session->open();
    $session->set('settings', $model);

    return $this->redirect('/settings');
  }


}
