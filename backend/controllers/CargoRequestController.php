<?php

namespace backend\controllers;

use common\models\CargoDbAuthor;
use common\models\CargoDbLogist;
use common\models\CargoDbOrders;
use common\models\CargoDbSuborders;
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
use common\models\CargoRequest;
use common\models\CargoGoodRoute;
use common\models\Search\CargoRequestSearch;
use common\models\Search\CargoRequestSearchArray;
use common\models\CargoCarType;


class CargoRequestController extends Controller
{

  public function actionUpdateDriver($id, $car_id = null)
  {

    $model = $this->findModel($id);

    $searchModel = new CargoRequestSearchArray();
    $searchModel->pagination = 15;

    $dataProvider = $searchModel->search([
      'address_from' => $model->address_from,
      'address_to' => $model->address_to,
//      'route_start' => $model->route_start,
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

        if ($route->load(Yii::$app->request->post()) && $route->save(false)) {

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

      if ($goodModel->load(Yii::$app->request->post()) && $goodModel->save(false)) {

      }
    }

    return $this->render('_update_good', [
      'model' => $model,
      'good' => $goodModel
    ]);

  }

  public function actionUpdate($id)
  {

    $model = new CargoRequest();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_update_request', [
      'model' => $model
    ]);
  }


  public function actionRouteStart()
  {

    if (Yii::$app->request->isAjax) {

      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $search = new CargoRequestSearch();
      $cargoRequestSearch = $search->search(Yii::$app->request->queryParams);

      $cargoRequestSearch = ArrayHelper::toArray($cargoRequestSearch->getModels());
      $cargoRequestSearch = ArrayHelper::map($cargoRequestSearch, 'id', 'route_start');
      return ['results' => $cargoRequestSearch];
    }
  }


  public function actionCreate()
  {

    $model = new CargoRequest();

    if ($model->load(Yii::$app->request->post())) {

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

      if ($good->save()) {

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

      return $this->redirect('/cargo-request/' . $model->id);
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    //$params = Yii::$app->request->isAjax ? $this->request->post() : $this->request->queryParams;
    $params = $this->request->queryParams;

    $searchModel = new CargoRequestSearch();
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

  public function actionImportJson()
  {

    ini_set('max_execution_time', '213300');
    ini_set('max_execution_time', '0'); // for infinite time of execution

    $ordersCnt = CargoDbOrders::find()->select('count(*) as cnt')->scalar();
    //$pages = range(intval($ordersCnt / 50) + 55, intval($ordersCnt / 50) + 200);
    $pages = range(100, 130);



    foreach ($pages as $key => $page) {

      sleep(rand(5, 20));

      $response = $this->getOrders($page);
      $response = json_decode($response, true);

      foreach ($response['clicarOrderList'] as $item) {

        if (!CargoDbOrders::find()->where(['number' => $item['number']])->one()) {

          $order = new CargoDbOrders([
            'number' => $item['number'],
            'order_condition' => $item['orderCondition'],
            'order_view_type' => $item['orderViewType'],
            'external_number' => $item['externalNumber'],
            'status_title' => $item['statusTitle'],
            'order_status' => $item['orderStatus'],
            'created_at' => $item['createdAt'],
            'viewed_at' => $item['viewedAt'],
            'client_role_code' => $item['clientRoleCode'],
            'client_title' => $item['clientTitle'],
            'transportation_way' => $item['transportationWay'],
            'resource_type_title' => $item['resourceTypeTitle'],
            'loading_dt' => $item['loadingDt'],
            'from_location_title' => $item['fromLocationTitle'],
            'route_points_count' => (string)$item['routePointsCount'],
            'to_location_title' => $item['toLocationTitle'],
            'from_address_title' => $item['fromAddressTitle'],
            'to_address_title' => $item['toAddressTitle'],
            'unloading_dt' => $item['unloadingDt'],
            'margin_percent' => (string)$item['marginPercent'],
            'margin' => (string)$item['margin'],
            'tariff_with_vat' => (string)$item['tariffWithVat'],
            'order_chat_message' => $item['orderChatMessage'],
            'weight_in_kg' => (string)$item['weightInKg'],
            'volume_in_cubic_meters' => (string)$item['volumeInCubicMeters'],
            'pallet_count' => (string)$item['palletCount'],
            'from_address_fact_slot_start_at' => $item['fromAddressFactSlotStartAt'],
            'from_address_fact_slot_end_at' => $item['fromAddressFactSlotEndAt'],
            'to_address_fact_slot_start_at' => $item['toAddressFactSlotStartAt'],
            'to_address_fact_slot_end_at' => $item['toAddressFactSlotEndAt'],
            'period_title' => $item['periodTitle'],
            'period_status' => $item['periodStatus'],
            'creation_type' => $item['creationType'],
            'shipping_documents_status' => $item['shippingDocumentsStatus'],
            'shipping_documents_files' => is_array($item['shippingDocumentsFiles']) ? json_encode($item['shippingDocumentsFiles']) : '',
          ]);

          if ($order->save()) {

            if ($item['suborders']) {

              foreach ($item['suborders'] as $suborder) {

                $subOrder = new CargoDbSuborders([
                  'db_order_id' => $order->id,
                  'suborder_number' => $suborder['suborderNumber'],
                  'carrier_title' => $suborder['carrierTitle'],
                  'carrier_phone' => $suborder['carrierPhone'],
                  'carrier_uuid' => $suborder['carrierUuid'],
                  'assigned_resource_type_title' => $suborder['assignedResourceTypeTitle'],
                  'driver_fio' => $suborder['driverFio'],
                  'driver_phone' => $suborder['driverPhone'],
                  'tractor_number' => $suborder['tractorNumber'],
                  'suborder_status' => $suborder['suborderStatus'],
                  'is_loop_exists' => (string)$suborder['isLoopExists'],
                  'assigned_tariff_without_vat' => (string)$suborder['assignedTariffWithoutVat'],
                ]);
                if (!$subOrder->save()) {
                  echo '<pre>';
                  print_r($subOrder->errors);
                  echo '</pre>';
                }
              }
            }


            $logist = new CargoDbLogist([
              'db_order_id' => $order->id,
              'logist_fio' => $item['logist']['logistFio'],
              'participant_title' => $item['logist']['participantTitle'],
              'participant_inn' => $item['logist']['participantInn'],
              'participant_kpp' => $item['logist']['participantKpp'],
              'is_own' => (string)$item['logist']['isOwn'],
            ]);
            if (!$logist->save()) {

              echo '<pre>';
              print_r($logist->errors);
              echo '</pre>';
            }

            $author = new CargoDbAuthor([
              'db_order_id' => $order->id,
              'author_fio' => $item['author']['authorFio'],
              'participant_title' => $item['author']['participantTitle'],
              'participant_inn' => $item['author']['participantInn'],
              'participant_kpp' => $item['author']['participantKpp'],
            ]);
            if (!$author->save()) {

              echo '<pre>';
              print_r($author->errors);
              echo '</pre>';
            }

          } else {

            echo '<pre>';
            print_r($order->errors);
            echo '</pre>';

          }
        }
      }


    }
  }

  public function getOrders($page, $size = 50)
  {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://app.oboz.com/oboz2-api-gateway/oboz2-order-po-viewer/v3/clicar_orders?page=' . $page . '&size=' . $size,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
        "sort": [
          {
            "field": "created_at",
            "direction": "DESC"
          }
        ],
        "group": "ALL",
        "filters": {
          "isLoopExists": null,
          "isEditable": null,
          "creationType": null
        }
      }',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ3Nm1zVUxNNXoyVTdIaE5nb1FURW93VG9XYTE2OGM2YlNzUWVIMGZUOGdnIn0.eyJleHAiOjE3MDY0NTI2NjIsImlhdCI6MTcwNjQyMzg2MiwianRpIjoiNjBiMTZlZGMtNDJjOC00OWVmLTgyNzktYzVmMTlmN2UwZTMzIiwiaXNzIjoiaHR0cDovL29ib3oyLWtleWNsb2FrLWh0dHAvYXV0aC9yZWFsbXMvb2JvejIiLCJhdWQiOiJhY2NvdW50Iiwic3ViIjoiZjo2NGFlMjU2NC01ZTI1LTQwN2ItYjA5NC0zMWI3M2E2ZDZmM2Y6NTc2YmEwY2UtMzk5NS00ZmUyLWJmMTUtNGM4ZDYyNzNiYWEyIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoib2JvejItYmFja2VuZCIsInNlc3Npb25fc3RhdGUiOiI1YTU3NDM5ZS05MDc1LTQ5YzktOTYzOC04YzZmNmU4NzZiNDciLCJhY3IiOiIxIiwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbIm1lbnVfY2xpY2FyX2FkdmFuY2VkIiwib2ZmbGluZV9hY2Nlc3MiLCJ1bWFfYXV0aG9yaXphdGlvbiJdfSwicmVzb3VyY2VfYWNjZXNzIjp7ImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6InByb2ZpbGUgZW1haWwiLCJzaWQiOiI1YTU3NDM5ZS05MDc1LTQ5YzktOTYzOC04YzZmNmU4NzZiNDciLCJ1c2VyX3V1aWQiOiI1NzZiYTBjZS0zOTk1LTRmZTItYmYxNS00YzhkNjI3M2JhYTIiLCJlbWFpbF92ZXJpZmllZCI6ZmFsc2UsImNvbnRyYWN0b3Jfcm9sZV9jb2RlIjoiQ0xJQ0FSIiwicHJlZmVycmVkX3VzZXJuYW1lIjoidG1rcnRjaHlhbkBvYm96LmNvbSIsImNvbnRyYWN0b3JfdXVpZCI6IjgxMWM5MjAwLWNmOTMtNDZjZS1iOWQ4LWRhNjAzODZlYjZhMCIsImVtYWlsIjoidG1rcnRjaHlhbkBvYm96LmNvbSJ9.MCQejq9Z7cKKQVYdnnc1tCPzxWUTdwhqmXGB6xzyaRp2ybT7P6279CkE1ABlI1v_tdrv6-irJB2FoNtb_ABTVr__-nHgEnJ9VFNszodd22YDZzbh91GWXBYH5lybCkFtZU6oFLkHr_tKWbywfwW-VwnHWPSRxLJfyIIW4GpExVkJALf_v9BwF5CooUIgH79BuAIE-2WHVDLlzlBkiPMmRgbek18x30XxjCVqo22zEu3Xmrz0IWkG0sppJC6txhnEZqBGdhxh-_dKIamworfrUAvZ4TQTUF4W9P8AII_SbMeqeFAta_y8xTaCe5irNOb2dlU6ozqoOFI5qy90rKtA-w',
        'Content-Type: application/json'
      ),
    ));

    return curl_exec($curl);
  }

  public function actionImport()
  {

    ini_set('max_execution_time', '13300');
    ini_set('max_execution_time', '0'); // for infinite time of execution

    foreach (range(400, 700) as $key => $file) {

      $filePath = '../../files/' . $file . '.html';
      //$filePath =  '../../files/32.html';
      if (file_exists($filePath)) {

        $dom = HtmlDomParser::file_get_html($filePath);

        $element = $dom->find('.data-row');
        foreach ($element as $item) {

          $orderNumber = $item->find('.order-number')[0]->innertext;
          if (!CargoRequest::find()->where(['number' => $orderNumber])->one()) {

            $createdAt = $item->find('.createdAt span')->innertext;
            $loadingDate = $item->find('.loading span')->innertext ?? false;
            $unloadingDate = $item->find('.unloading span')->innertext ?? false;
            $tractorNumber = $item->find('.tractorNumber span')->innertext ?? '';

            $priceRight = trim($item->find('.price-right span')->innertext[0]);
            if ($priceRight) {

              $priceRight = str_replace(' ', '', $priceRight);
              $priceRight = str_replace('&nbsp;', '', $priceRight);
              $priceRight = str_replace('₽', '', $priceRight);
              $priceRight = str_replace(',', '.', $priceRight);
            }

            $assignedTariffWithoutVat = $item->find('.assignedTariffWithoutVat div div div')->innertext[0];
            $assignedTariffWithoutVat = str_replace(' ', '', $assignedTariffWithoutVat);
            $assignedTariffWithoutVat = str_replace('&nbsp;', '', $assignedTariffWithoutVat);
            $assignedTariffWithoutVat = str_replace('₽', '', $assignedTariffWithoutVat);
            $assignedTariffWithoutVat = str_replace(',', '.', $assignedTariffWithoutVat);

            $data = [
              '№ заказа клиента' => $item->find('.order-number')[0]->innertext, //заказ
              'Спот, квота' => $item->find('.spotQuota .ob-tooltip__content')->innertext[0], // Статус - Спот/квота
              'Статус заказа клиента' => $item->find('.order-status-title__description')[0]->innertext ?? '',
              'Дата создания' => $createdAt[0] . ' ' . $createdAt[1],
              'Клиент' => trim($item->find('.client__title')->innertext[0]),//ДжиИксО Лоджистикс ООО
              'Тип заказа' => $item->find('.orders-view-type .ob-tooltip__content')->innertext[0] ?? '', //Городская развозка/межгород
              'Модальность' => $item->find('.transportationWay .ob-tooltip__content')->innertext[0] ?? '', //Городская развозка/межгород
              'Адрес первой погрузки' => $item->find('.fromAddressTitle span')->innertext[0], //адрес загрузки
              'Адрес последней выгрузки' => $item->find('.toAddressTitle span')->innertext[0], //адрес выгрузки
              'Кубаж, м3' => $item->find('td')[14]->textContent,
              'Тоннаж, кг' => $item->find('td')[15]->textContent,
              'Паллетаж, пал' => $item->find('td')[16]->textContent,
              'Плановая погрузка' => $loadingDate ? $loadingDate[0] . ' ' . $loadingDate[1] : '',
              'Плановая выгрузка' => $unloadingDate ? $unloadingDate[0] . ' ' . $unloadingDate[1] : '',
              'Старт маршрута' => $item->find('.orders-list-route-start')->innertext[0] ?? '',
              'Конец маршрута' => $item->find('.orders-list-route-end')->innertext[0] ?? '',
              'margin-percent' => $item->find('.margin-percent')->innertext[0] ?? '',
              'Клиент платит' => $priceRight,
              'Оплата перевозчику' => $assignedTariffWithoutVat,
              'Перевозчик' => $item->find('.carrier div a')->innertext[0] ?? '',
              'Телефон перевозчика' => $item->find('.carrier-phone__item')->innertext[0],
              'Тип авто перевозчика' => $item->find('.resource-type span')->innertext[0],
              'Номер авто' => ($tractorNumber[0] ?? '') . ' ' . ($tractorNumber[1] ?? ''),
              'Водитель' => $item->find('.driver__item span')->innertext[0] ?? '',
              'Телефон водителя' => $item->find('.driver-phone__item')->innertext[0] ?? '',
              'file' => $file
            ];

            $this->import($data);
          }
        }
      }
    }
  }

  public function import($item)
  {

    if (!$counterparty = CargoCounterparty::find()->where(['name' => $item['Клиент']])->one()) {

      $counterparty = new CargoCounterparty([
        'name' => $item['Клиент']
      ]);
      $counterparty->save();
    }

    $carrier = trim($item['Перевозчик']);
    $carrier = $carrier != '—' ? $carrier : false;
    if ($carrier && !$carrierModel = CargoCarrier::find()->where(['name' => $carrier])->one()) {

      $carrierModel = new CargoCarrier([
        'name' => $item['Перевозчик'],
        'phone' => $item['Телефон перевозчика']
      ]);
      $carrierModel->save();
    }

    $tonnage = trim($item['Тоннаж, кг']);
    $tonnage = $tonnage != '—' ? $tonnage : null;

    $palletage = trim($item['Паллетаж, пал']);
    $palletage = $palletage != '—' ? $palletage : null;

    $kube = trim($item['Кубаж, м3']);
    $kube = $kube != '—' ? $kube : null;

    $good = new CargoGood([
      'counterparty_id' => $counterparty->id ?? null,
      'weight' => is_numeric($tonnage) ? $tonnage : null,
      'palette' => is_numeric($tonnage) ? $palletage : null,
      'capacity' => is_numeric($kube) ? $kube : null,
    ]);

    if ($good->save()) {

      $driverInfo = trim($item['Водитель']);
      $driverInfo = $driverInfo != '—' && $driverInfo;

      if ($driverInfo) {

        $driverInfo = explode(' ', $item['Водитель']);

        $name = isset($driverInfo[0]) ? trim($driverInfo[0]) : '';
        $name = !empty($name) ? mb_convert_case(mb_strtolower($name), MB_CASE_TITLE, "UTF-8") : '';

        $first_name = isset($driverInfo[1]) ? trim($driverInfo[1]) : '';
        $first_name = !empty($first_name) ? mb_convert_case(mb_strtolower($first_name), MB_CASE_TITLE, "UTF-8") : '';

        $last_name = isset($driverInfo[2]) ? trim($driverInfo[2]) : '';
        $last_name = !empty($last_name) ? mb_convert_case(mb_strtolower($last_name), MB_CASE_TITLE, "UTF-8") : '';

        $driverModel = CargoDriver::find()
          ->where(['name' => $name, 'first_name' => $first_name, 'last_name' => $last_name])->one();

        if (!$driverModel) {

          $carInfo = explode(' ', $item['Тип авто перевозчика']);
          if (count($carInfo) == 2) {

            if (!$carTypeModel = CargoCarType::find()->where(['name' => trim($carInfo[0])])->one()) {

              $carTypeModel = new CargoCarType([
                'name' => trim($carInfo[0])
              ]);
              $carTypeModel->save();
            }

            $carInfo = explode('/', $carInfo[1]);
            $carModel = new CargoCar([
              'car_type_id' => $carTypeModel->id,
              'weight' => intval(mb_substr($carInfo[0] ?? '', 0, -1)),
              'capacity' => intval(mb_substr($carInfo[1] ?? '', 0, -2)),
              'palette' => intval(mb_substr($carInfo[2] ?? '', 0, -3)),
              'description' => $item['Тип авто перевозчика']
            ]);
            $carModel->save();
          }

          $driverModel = new CargoDriver([
            'name' => $name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'carrier_id' => $carrierModel->id ?? null,
            'car_id' => $carModel->id ?? null,
            'phone' => $item['Телефон водителя'],
          ]);
          $driverModel->save();
        }
      }

      $goodRoute = new CargoGoodRoute([
        'good_id' => $good->id,
        'city_start' => $item['Старт маршрута'],
        'city_end' => $item['Конец маршрута'],
      ]);
      if ($goodRoute->save()) {

        $cargoGoodRouteDirection = new CargoGoodRouteDirection([
          'good_route_id' => $goodRoute->id,
          'address_start' => $item['Адрес первой погрузки'],
          'address_end' => $item['Адрес последней выгрузки'],
          'date_start' => $item['Плановая погрузка'],
          'date_end' => $item['Плановая выгрузка'],
        ]);

        if (!$cargoGoodRouteDirection->save()) {

        }
      }
    } else {


    }

    $request = new CargoRequest([
      'good_id' => $good->id,
      'date' => $item['Дата создания'],
      'number' => $item['№ заказа клиента'],
      'address_from' => $item['Адрес первой погрузки'],
      'address_to' => $item['Адрес последней выгрузки'],
      'route_start' => $item['Старт маршрута'],
      'route_end' => $item['Конец маршрута'],
      'price' => $item['Клиент платит'],
      'description' => $item['Тип авто перевозчика'] != '—' ? $item['Тип авто перевозчика'] : '',
    ]);
    if ($request->save()) {

    }
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

    if (!$model = CargoRequest::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден товар с id={id}', ['id' => $id]));
    }

    return $model;
  }

}
