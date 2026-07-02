<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;
use common\models\Feeds;
use common\models\FeedsItems;
use common\models\Products;

/**
 * Feeds controller
 */
class FeedsController extends Controller {

  public $layout = "main";

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

  public function actionIndex($id) {

  $columns = [];  
  $columns['columns'][] = 'ID';
  $columns['columns'][] = 'ID2';
  $columns['columns'][] = 'Title';
  $columns['columns'][] = 'URL';
  $columns['columns'][] = 'Image';
  $columns['columns'][] = 'Description';
  $columns['columns'][] = 'Price';
  $columns['columns'][] = 'Old price';
  $columns['columns'][]= 'Currency';

    $response = Yii::$app->response;
    $response->format = \yii\web\Response::FORMAT_RAW;

    $filePath = \Yii::getAlias('@feeds/feed'.$id.'.csv');
    $fp = fopen($filePath, 'w');
    fputs($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));


    foreach ($columns as $fields) {
        fputcsv($fp, $fields, ',');
    }

    if($model = $this->findModel($id)) {

        $feedsItems = FeedsItems::find()->where(['feed_id' => $id])->all();

        

        foreach($feedsItems as $item) {

            $product = Products::findOne($item->product_id);
            
            $data[$item->product_id][] = $product->id;
            $data[$item->product_id][] = '';
            $data[$item->product_id][] = ucfirst(mb_strtolower($product->name, 'UTF-8'));
            $data[$item->product_id][] = Yii::$app->params['siteUrl'].'/catalog/'.$product->category_id.'/'.$product->id;
            $data[$item->product_id][] = Yii::$app->params['siteUrl'].$product->images[0]->original??'';
            $data[$item->product_id][] = $product->announce;
            $data[$item->product_id][] = $product->price;
            $data[$item->product_id][] = '';
            $data[$item->product_id][] = 'RUR';
        }

        foreach ($data as $fields) {
            fputcsv($fp, $fields, ',');
        }
    }

    fclose($fp);
    
    die;//return Yii::$app->response->sendFile($filePath);

  }

  private function findModel($id)
  {

    if (!$model = Feeds::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден фид с id={id}', ['id' => $id]));
    }

    return $model;
  }
}
