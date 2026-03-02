<?php

namespace backend\controllers;

use app\components\CargoOrdersService;
use common\models\CargoDbAuthor;
use common\models\CargoDbLogist;
use common\models\CargoDbOrders;
use common\models\CargoDbSuborders;
use common\models\CargoOrdersCarrier;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

use voku\helper\HtmlDomParser;
use common\models\CargoCar;

use common\models\CargoCarrier;
use common\models\CargoCounterparty;
use common\models\CargoGood;
use common\models\CargoDriver;
use common\models\CargoGoodRouteDirection;
use common\models\CargoGoodRoute;
use common\models\Search\CargoOrdersSearchArray;
use common\models\CargoCarType;
use common\models\CargoOrders;
use common\models\Search\CargoRequestSearchArray;


class CargoOrdersController extends Controller
{

  public function actionMap($id)
  {

    $model = $this->findModel($id);

    return $this->render('_map', [
      'model' => $model,
    ]);
  }

  public function actionUpdateCarrier($id)
  {

    $model = $this->findModel($id);
    $searchModel = new CargoRequestSearchArray();
    $searchModel->pagination = 30;

    $dataProvider = CargoordersService::getCarriers($model, [
      'address_from' => $model->address_from,
      'address_to' => $model->address_to,
      'route_start' => $model->route_start,
      'route_end' => $model->route_end,
      'car_type_id' => $model->car_type_id,
    ]);

    return $this->render('_update_carrier', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }


  public function actionUpdateDriver($id)
  {

    $model = $this->findModel($id);

    $searchModel = new CargoRequestSearchArray();
    $searchModel->pagination = 15;

    $dataProvider = $searchModel->search([
      'address_from' => $model->address_from,
      'address_to' => $model->address_to,
      'route_start' => $model->route_start,
      'route_end' => $model->route_end,
      'car_type_id' => $model->car_type_id,
    ]);

    return $this->render('_update_driver', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionUpdateRoute($id, $route_id = null)
  {

    $model = $this->findModel($id);


    if (Yii::$app->request->isPost) {

      if ($route_id && $route = CargoGoodRoute::findone($route_id)) {

        if ($direction = $route->direction) {

          $direction->load(Yii::$app->request->post());
          $direction->save();
        }
      }
    }

    return $this->render('_update_route', [
      'model' => $model,
      'route' => $model->good->route,
      'direction' => $model->good->route->direction,
    ]);

  }

  public function actionUpdateGood($id)
  {

    $model = $this->findModel($id);

    $goodModel = CargoGood::find()->where(['id' => $model->good_id])->one();

    if (Yii::$app->request->isPost) {

      if ($goodModel->load(Yii::$app->request->post())) {

        $counterparty = CargoCounterparty::find()->where(['name' => $goodModel->counterparty])->one();

        if (!empty($goodModel->counterparty) && !$counterparty) {
          $counterparty = new CargoCounterparty([
            'name' => $goodModel->counterparty
          ]);
          $counterparty->save();
          $goodModel->counterparty_id = $counterparty->id;
        }

        $goodModel->save(false);

      }
    }

    return $this->render('_update_good', [
      'model' => $model,
      'good' => $goodModel
    ]);
  }

  public function actionUpdate($id)
  {

    $model = new CargoOrders();
    $model = $model->find()->where(['id' => $id])->one();

    if (Yii::$app->request->isPost) {

      if ($model->load(Yii::$app->request->post())) {

        $model->save(false);
      }
    }

    return $this->render('_update_order', [
      'model' => $model
    ]);
  }

  public function actionRouteStart()
  {

    if (Yii::$app->request->isAjax) {

      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $search = new CargoOrdersSearch();
      $cargoRequestSearch = $search->search(Yii::$app->request->queryParams);

      $cargoRequestSearch = ArrayHelper::toArray($cargoRequestSearch->getModels());
      $cargoRequestSearch = ArrayHelper::map($cargoRequestSearch, 'id', 'route_start');
      return ['results' => $cargoRequestSearch];
    }
  }

  public function actionOrderComment($id)
  {

    if (Yii::$app->request->isAjax) {

      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $carrier_id = Yii::$app->request->post('carrier_id');

      if($orderCarrier = CargoOrdersCarrier::find()->where(['order_id' => $id, 'carrier_id' => $carrier_id])->one()) {

        $orderCarrier->load(Yii::$app->request->post());

      } else {

        $orderCarrier = new CargoOrdersCarrier();
        $orderCarrier->load(Yii::$app->request->post());
      }

      $orderCarrier->save();
      die;
    }
  }

  public function actionCarrierComment($id)
  {

    if (Yii::$app->request->isAjax) {

      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      if($orderCarrier = CargoCarrier::find()->where(['id' => $id])->one()) {

        $orderCarrier->load(Yii::$app->request->post());

      } else {

        $orderCarrier = new CargoCarrier();
        $orderCarrier->load(Yii::$app->request->post());
      }

      $orderCarrier->save();
      die;
    }
  }



  public function actionCreate()
  {

    $model = new CargoOrders();

    if ($model->load(Yii::$app->request->post())) {

      if (!empty($model->goodType)) {
        $goodType = new CargoGoodType([
          'name' => trim($model->goodType)
        ]);
        $goodType->save();
        $model->good_type_id = $goodType->id;
      }

      if (!empty($model->counterparty)) {
        $counterparty = new CargoCounterparty([
          'name' => $model->counterparty
        ]);
        $counterparty->save();
        $model->counterparty_id = $counterparty->id;
      }

      $good = new CargoGood([
        'weight' => $model->weight,
        'capacity' => $model->capacity,
        'palette' => $model->palette,
        'counterparty_id' => $model->counterparty_id
      ]);

      if ($good->save(false)) {

        $goodRoute = new CargoGoodRoute([
          'good_id' => $good->id,
          'city_start' => $model->route_start,
          'city_end' => $model->route_end,
        ]);
        $goodRoute->save();

        $goodRouteDirection = new CargoGoodRouteDirection([
          'good_route_id' => $goodRoute->id,
          'address_start' => $model->address_from,
          'address_end' => $model->address_to,
          'lat_start' => $model->lat_start,
          'lon_start' => $model->lon_start,
          'lat_end' => $model->lat_end,
          'lon_end' => $model->lon_end
        ]);
        $goodRouteDirection->save(false);

        $model->good_id = $good->id;
        $model->number = $good->id;
        $model->save(false);
      }

      return $this->redirect('/cargo-orders/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    //$params = Yii::$app->request->isAjax ? $this->request->post() : $this->request->queryParams;
    $params = $this->request->queryParams;

    $searchModel = new CargoOrdersSearchArray();
    $dataProvider = $searchModel->search($params ?? []);

    $data = [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ];

//    if (Yii::$app->request->isAjax) {
//
//      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//
//      return $this->renderAjax('index', $data);
//    }
    return $this->render('index', $data);
  }

  public function actionDelete($id)
  {

    $model = new RequestTransportation();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/blocks');
  }


  private function findModel($id)
  {

    if (!$model = CargoOrders::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден товар с id={id}', ['id' => $id]));
    }

    return $model;
  }

  public function actionAti()
  {

    ini_set('max_execution_time', '13300');
    ini_set('max_execution_time', '0'); // for infinite time of execution

    $filePath = '../../files/ati/1.html';
    if (file_exists($filePath)) {

      $dom = HtmlDomParser::file_get_html($filePath);

      $element = $dom->find('div[data-app="pretty-load"]');

      foreach ($element as $key => $item) {

        $number = $item->children(0)->children(1)->children(0)->children(2);//->children(0)->innertext;

        if ($numberChildren = $item->children(0)->children(1)->children(0)->childNodes->length) {

          switch ($numberChildren) {

            case 3:
              $number = $item->children(0)->children(1)->children(0)->children(2);
              $number = $number->children(0)->textContent;
              break;
            case 4:
              $number = $item->children(0)->children(1)->children(0)->children(3);
              $number = $number->children(0)->textContent;
              break;
              break;
          }

        }

        $carType = $item->children(0)->children(2)->children(0)->children(0)->children(0)->find('span')->innertext;
        $zagrVigruzType = $item->children(0)->children(2)->children(0);//->children(1)->children(0)->innertext;



        $zagrVigruz = $item->children(0)->children(2)->children(0)->children(1);//->children(1)->innertext;
        if (!is_null($zagrVigruz) && !is_null($zagrVigruz->children(1))) {
          $zagrVigruz = $zagrVigruz->children(1)->innertext;
        } else {
          $zagrVigruz = '';
        }

        $carZagruzkaType = $item->children(0)->children(2)->children(0)->children(2);//->children(0)->textContent;
        if (!is_null($carZagruzkaType)) {
          if (!is_null($carZagruzkaType->children(0))) {
            $carZagruzkaType = $carZagruzkaType->children(0)->textContent;
          } else {
            $carZagruzkaType = $carZagruzkaType->textContent;
          }

        }


        $weight = $item->children(0)->children(3)->children(0)->children(0)->children(0)->children(0)->textContent;
        $productType = $item->children(0)->children(3)->children(0)->children(0)->children(0)->children(1)->textContent ?? false;
        $product = $item->children(0)->children(3)->children(0)->children(0)->children(2)->textContent ?? false;


        $routeStart = $item->children(0)->children(4)->children(0)->children(0)->children(0)->children(0)->children(0)->textContent ?? false;
        $routeEnd = $item->children(0)->children(5)->children(0)->children(0)->children(0)->children(0);//->children(0)->textContent??false;

        $routInfo = $item->children(0)->children(5)->children(0)->children(0)->children(0)->children(1);
        $routStreet = $item->children(0)->children(5)->children(0)->children(0)->children(0)->children(2);


        if (!is_null($routeEnd)) {

          if (!is_null($routInfo)) {

            $routInfo = $routInfo->textContent;
          }

          if (!is_null($routStreet)) {

            $routStreet = $routStreet->textContent;
          }

          if (!is_null($routeEnd->children(0))) {
            $routeEnd = $routeEnd->children(0)->textContent;
          } else {
            $routeEnd = $routeEnd->textContent;
          }
        }

        $summaNDS = '';
        if (
          $item->children(0)->children(6)->children(0)->children(0)->childNodes->length &&
          $item->children(0)->children(6)->children(0)->children(0)->children(0)->childNodes->length &&
          $item->children(0)->children(6)->children(0)->children(0)->children(0)->children(0)->childNodes->length
        ) {

          $summaNDS = $item->children(0)->children(6)->children(0)->children(0)->children(0)->children(0)->children(0)->textContent ?? '';
        }

        $summa = $item->children(0)->children(6)->children(0)->children(0);
        if (!is_null($summa) && !is_null($summa->children(1))) {

          if (!is_null($summa->children(1)->children(0)->children(0))) {

            $summa = $summa->children(1)->children(0)->children(0)->textContent;
          } else {
            $summa = $summa->textContent;
          }
        }

        $torg = '';
        if (
          $item->children(0)->children(6)->children(0)->children &&
          $item->children(0)->children(6)->children(0)->children(1)->children &&
          $item->children(0)->children(6)->children(0)->childNodes
        ) {

          $torg = $item->children(0)->children(6)->children(0)->children(1)->children(0)->textContent ?? '';
        }

        $firma = '';
        $phone = '';
        $contacts = '';
        if ($children = $item->children(0)->children(7)->children(0)->children(1)->children(0)->childNodes->length) {

          switch ($children) {

            case 2:
              $firma = $item->children(0)->children(7)->children(0)->children(1)->children(0)->children(0)->children(0);
              $phone = $item->children(0)->children(7)->children(0)->children(1)->children(0)->children(1)->find('a')->innertext;
              $contacts = $item->children(0)->children(7)->children(0)->children(1)->children(0)->children(1)->textContent;

              if (!is_null($firma)) {
                $firma = $firma->textContent;
              }
              break;

            case 3:

              $firma = $item->children(0)->children(7)->children(0)->children(1)->children(0)->children(1)->children(0);
              $phone = $item->children(0)->children(7)->children(0)->children(1)->children(0)->children(2)->find('a')->innertext;
              $contacts = $item->children(0)->children(7)->children(0)->children(1)->children(0)->textContent??'';

              if (!is_null($firma)) {
                $firma = $firma->textContent;
              }
              break;
          }

        }

        $link = $item->children(0)->children(8);

        if (!is_null($link)) {

          $link = $link->children(0)->children(0)->children(0)->href;

        }

        $data[] = [
          'carType' => $carType,
          'zagrVigruzType' => $zagrVigruzType,
          'zagrVigruz' => $zagrVigruz,
          'carZagruzkaType' => $carZagruzkaType,
          'weight' => $weight,
          'productType' => $productType,
          'product' => $product,
          'routeStart' => $routeStart,
          'routeEnd' => $routeEnd,
          'routInfo' => $routInfo,
          'routStreet' => $routStreet,
          'number' => $number,
          'summaNDS' => $summaNDS,
          'summa' => $summa,
          'torg' => $torg,
          'firma' => $firma,
          'phone' => $phone[1]??'',
          'link' => $link,
          'contacts' => $contacts,
        ];
      }
    }


    foreach ($data as $item) {

      if (!empty($item['number'])) {

        $model = CargoOrders::find()->where(['number_ati' => $item['number']])->one();
        if (!$model) {

          $summa = $item['summa'];
          $summa = str_replace(' ', '', $summa);
          $summa = str_replace('&nbsp;', '', $summa);
          $summa = str_replace('руб', '', $summa);
          $summa = ((int)$summa) * 100;

          $model = new CargoOrders();
          $model->number = '';
          $model->address_from = $item['routeStart'];
          $model->address_to = $item['routeEnd'];
          $model->route_start = '';
          $model->route_end = '';
          $model->counterparty_price = $summa;
          $model->carrier_price = '';
//        $model->good_id = '';
//        $model->good_type_id = '';
          $model->description = implode('<br>', $this->getOrderDescription($item));
          $model->comment = '';
          $model->archive = 0;
          $model->number_ati = $item['number'];
          $model->url_ati = $item['link'];

          if (!empty($item['weight'])) {

            $item['weight'] = str_replace(' ', '', $item['weight']);
            $item['weight'] = str_replace(',', '.', $item['weight']);
            $weight = explode('/', $item['weight']);
          }

          $good = new CargoGood([
            'weight' => is_numeric($weight[0]) ? $weight[0] * 1000 : 0,
            'capacity' => (int)$weight[1],
          ]);

          if ($good->save(false)) {

            $goodRoute = new CargoGoodRoute([
              'good_id' => $good->id,
              'city_start' => $model->route_start,
              'city_end' => $model->route_end
            ]);
            $goodRoute->save();


            $goodRouteDirection = new CargoGoodRouteDirection([
              'good_route_id' => $goodRoute->id,
              'address_start' => $model->address_from,
              'address_end' => $model->address_to
            ]);
            $goodRouteDirection->save(false);

            $model->good_id = $good->id;
            $model->number = $good->id;
            $model->save(false);

          }

        }

      }
    }

    die;
  }

  function getOrderDescription($arr = [])
  {

//      [carType] => Array
//      (
//      [0] => реф.+терм. цмет.
//      [1] => реф.+изотерм цельнометалл.
//          )
//
//      [zagrVigruzType] => загр/выгр:
//      [zagrVigruz] => задн.задняя
//      [carZagruzkaType] => отд.машина
//      [weight] => 1,8 / 12
//      [productType] => ТНП
//      [product] =>
//      [routeStart] => Москва
//      [routeEnd] => Одинцово
//      [routInfo] =>
//      [routStreet] =>
//      [number] => #ASC1004
//      [summaNDS] => 18 000 руб
//      [summa] => 15 000 руб
//      [torg] =>
//      [firma] => СИБУРТЭК, ООО

    $arr['weight'] = str_replace(' ', '', $arr['weight']);
    $weight = explode('/', $arr['weight']);

    return [
      '<b>Фирма</b>: '.$arr['firma'],
      '<b>Телефон</b>: '.$arr['phone'],
      '<b>Контакты</b>: '.$arr['contacts'],
      '<b>Авто</b>: '.$arr['carType'][1]??'',
      '<b>Загрузка</b>: '.$arr['zagrVigruzType'] . ', ' . $arr['zagrVigruz'] . ', ' . $arr['carZagruzkaType'],
      '<b>Тонаж</b>: '.$weight[0] ?? '',
      '<b>Палеттаж</b>: '.$weight[1] ?? '',
      '<b>Товар</b>: '.$arr['productType'],
      '<b>Описание товара</b>: '.$arr['product'],
      '<b>Начало</b>: '.$arr['routeStart'],
      '<b>Конец</b>: '.$arr['routeEnd'],
      '<b>Адрес Начало</b>: '.$arr['routInfo'],
      '<b>Адрес Конец</b>: '.$arr['routStreet'],
      '<b>Номер АТИ</b>: '.$arr['number'],
      '<b>Сумма</b>: '.$arr['summa'],
      '<b>Сумма, НДС</b>: '.$arr['summaNDS'],
      '<b>Торг</b>: '.$arr['torg'],
    ];

  }

}
