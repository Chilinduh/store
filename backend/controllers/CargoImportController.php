<?php

namespace backend\controllers;

use common\models\CargoAuthor;
use common\models\CargoDbOrders;
use common\models\CargoGoodRouteShipping;
use yii\web\Controller;
use common\models\CargoCar;

use common\models\CargoCarrier;
use common\models\CargoCounterparty;
use common\models\CargoGood;
use common\models\CargoDriver;
use common\models\CargoGoodRouteDirection;
use common\models\CargoRequest;
use common\models\CargoGoodRoute;
use common\models\CargoCarType;
use common\models\CargoLogist;


class CargoImportController extends Controller
{

  public function actionIndex()
  {

    ini_set('max_execution_time', '13300');
    ini_set('max_execution_time', '0'); // for infinite time of execution

    $requestCnt = CargoRequest::find()->select('count(*) as cnt')->scalar();
    $orders = CargoDbOrders::find()->where(['>', 'id', $requestCnt])->limit('50000')->orderBy('id', 'asc')->all();

//    $orders = CargoDbOrders::find()->limit('1000')->all();
//    $orders = CargoDbOrders::find()->where(['id' => 956])->all();

    foreach ($orders as $order) {

      //if(!CargoRequest::find()->where(['number' => $order['number']])->one()) {

      $this->import($order);
      //}

    }
  }

  public function import($item)
  {

    if (!$counterparty = CargoCounterparty::find()->where(['name' => $item['client_title']])->one()) {

      $counterparty = new CargoCounterparty([
        'name' => $item['client_title']
      ]);
      $counterparty->save();
    }

    $tonnage = trim($item['weight_in_kg']);
    $tonnage = $tonnage != '—' ? $tonnage : null;

    $palletage = trim($item['pallet_count']);
    $palletage = $palletage != '—' ? $palletage : null;

    $kube = trim($item['volume_in_cubic_meters']);
    $kube = $kube != '—' ? $kube : null;

    $good = new CargoGood([
      'counterparty_id' => $counterparty->id ?? null,
      'weight' => is_numeric($tonnage) ? $tonnage : null,
      'palette' => is_numeric($tonnage) ? $palletage : null,
      'capacity' => is_numeric($kube) ? $kube : null,
    ]);

    if ($good->save()) {

      $goodRoute = new CargoGoodRoute([
        'good_id' => $good->id,
        'city_start' => $item['from_location_title'],
        'city_end' => $item['to_location_title'],
      ]);
      if (!$goodRoute->save()) {
        echo '<pre>';
        print_r($goodRoute->errors);
        echo '</pre>';
        die;
      }

      $cargoGoodRouteDirection = new CargoGoodRouteDirection([
        'good_route_id' => $goodRoute->id,
        'address_start' => $item['from_address_title'],
        'address_end' => $item['to_address_title'],
        'date_start' => $item['loading_dt'],
        'date_end' => $item['unloading_dt'],
      ]);

      if (!$cargoGoodRouteDirection->save()) {

        echo '<pre>';
        print_r($cargoGoodRouteDirection->errors);
        echo '</pre>';
        die;
      }

      foreach ($item->subOrders as $suborder) {

        $driverModel = null;
        $carrierModel = null;
        $carrier = trim($suborder['carrier_title']);
        if ($carrier && !$carrierModel = CargoCarrier::find()->where(['name' => $carrier])->one()) {

          $carrierModel = new CargoCarrier([
            'name' => $suborder['carrier_title'],
            'phone' => $suborder['carrier_phone']
          ]);
          $carrierModel->save();
        }

        $driverInfo = trim($suborder['driver_fio']);

        if ($driverInfo) {

          $driverInfo = $this->setDriver($driverInfo);
          $driverModel = CargoDriver::find()
            ->where([
              'name' => $driverInfo['name'],
              'first_name' => $driverInfo['first_name'],
              'last_name' => $driverInfo['last_name'],
              'phone' => $suborder['driver_phone']
            ])->one();

          if (!$driverModel) {

            $carInfo = explode(' ', $suborder['assigned_resource_type_title']);
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
                'description' => $suborder['assigned_resource_type_title']
              ]);
              $carModel->save();
            }

            $driverModel = new CargoDriver([
              'name' => $driverInfo['name'],
              'first_name' => $driverInfo['first_name'],
              'last_name' => $driverInfo['last_name'],
              'carrier_id' => $carrierModel->id ?? null,
              'car_id' => $carModel->id ?? null,
              'phone' => $suborder['driver_phone'],
            ]);
            $driverModel->save();
          }

        }

        if ($driverModel || $carrierModel) {

          $cargoGoodRouteShipping = new CargoGoodRouteShipping([
            'good_route_id' => $goodRoute->id,
            'carrier_id' => $carrierModel->id ?? '',
            'driver_id' => $driverModel->id ?? '',
            'price' => $suborder['assigned_tariff_without_vat'],
          ]);

          if (!$cargoGoodRouteShipping->save()) {

            echo '<pre>';
            print_r($cargoGoodRouteShipping->errors);
            echo '</pre>';
            die;
          }
        }

      }
    } else {

      echo '<pre>';
      print_r($good->errors);
      echo '</pre>';
      die;
    }

    $request = new CargoRequest([
      'good_id' => $good->id,
      'date' => $item['created_at'],
      'number' => $item['number'],
      'address_from' => $item['from_address_title'],
      'address_to' => $item['to_address_title'],
      'route_start' => $item['from_location_title'],
      'route_end' => $item['to_location_title'],
      'price' => $item['tariff_with_vat'],
      'description' => $item['resource_type_title']
    ]);

    if ($request->save()) {
      if (isset($item->logist)) {
        $logist = new CargoLogist([
          'request_id' => $request->id,
          'fio' => $item->logist->logist_fio,
          'inn' => $item->logist->participant_inn,
          'kpp' => $item->logist->participant_kpp,
        ]);
        if (!$logist->save()) {

          echo '<pre>';
          print_r($logist->errors);
          echo '</pre>';
        }
      }
      if (isset($item->author)) {
        $author = new CargoAuthor([
          'request_id' => $request->id,
          'fio' => $item->author->author_fio,
          'inn' => $item->author->participant_inn,
          'kpp' => $item->author->participant_kpp,
        ]);
        if (!$author->save()) {

          echo '<pre>';
          print_r($author->errors);
          echo '</pre>';
        }
      }

    }
  }


  public function setDriver($driver)
  {

    $driverInfo = explode(' ', $driver);

    $name = isset($driverInfo[0]) ? trim($driverInfo[0]) : '';
    $name = !empty($name) ? mb_convert_case(mb_strtolower($name), MB_CASE_TITLE, "UTF-8") : '';

    $first_name = isset($driverInfo[1]) ? trim($driverInfo[1]) : '';
    $first_name = !empty($first_name) ? mb_convert_case(mb_strtolower($first_name), MB_CASE_TITLE, "UTF-8") : '';

    $last_name = isset($driverInfo[2]) ? trim($driverInfo[2]) : '';
    $last_name = !empty($last_name) ? mb_convert_case(mb_strtolower($last_name), MB_CASE_TITLE, "UTF-8") : '';

    return [
      'name' => $name,
      'first_name' => $first_name,
      'last_name' => $last_name
    ];
  }

}
