<?php

namespace common\components;

use Yii;
use yii\web\NotFoundHttpException;
use yii\base\BaseObject;
use yii\base\Component;
use GuzzleHttp\Client;
use yii\helpers\ArrayHelper;


class CdekApi extends Component
{

  public $account = 'wbf9NTmqfXGlcEHhFLL6Q8C31te8P79g';
  public $secure = 'qUjizZUPl1dYjxNTynW2ioNU1rqSVqtb';

  public $cdek = '';
  public $token = '';

  public function init()
  {

    $this->account = Yii::$app->params['cdekApiTestAccount'];
    $this->secure = Yii::$app->params['cdekApiTestSecure'];
    $this->cdek = new Client();
  }

  public function token()
  {

    $response = $this->request('post', 'oauth/token?parameters', [
      'grant_type' => 'client_credentials',
      'client_id' => $this->account,
      'client_secret' => $this->secure
    ]);

    $this->token = $response['access_token'] ?? '';
    return $this->token;
  }

  //пункты доставки
  public function getDeliveryRegions(array $data = [
    'country_codes' => 'RU'
  ])
  {

    $response = $this->request('get', 'location/regions', $data);
    return $response;
  }

  //пункты доставки
  public function getDeliveryCities(array $data = [
    'region_code' => 81, //Москва
    'country_codes' => ['RU']
  ])
  {

    $response = $this->request('get', 'location/cities', $data);
    return $response;
  }

  //пункты доставки
  public function getTariffList(array $data = [])
  {

    $response = $this->request('post', 'calculator/tarifflist', $data);
    return $response;
  }

  //пункты доставки
  public function getTariff(array $data = [])
  {

    $response = $this->request('post', 'calculator/tariff', $data);
    return $response;
  }
  //пункты доставки
  public function getDeliveryPoints(array $data = [])
  {

    $response = $this->request('get', 'deliverypoints', $data);
    return $response;
  }

  public function getOrders($id)
  {

    $response = false;
    if (!empty($url)) {

      $response = $this->request('get', Yii::$app->params['cdekApiTest'] . 'orders' . $id);
      $response = json_decode($response->getBody()->getContents(), true);
    }
    return $response;
  }

  public function createOrder($data = [])
  {
    echo Yii::$app->params['cdekApiTest'] . 'orders';
    $response = false;
    if (count($data)) {

      $response = $this->request(Yii::$app->params['cdekApiTest'] . 'orders', $data);
      $response = json_decode($response->getBody()->getContents(), true);
    }
    return $response;
  }

  public function request($method = 'POST', $url = '', $data = [])
  {

    $response = false;
    if (!empty($url)) {

      $headers = [];
      $headers['headers']['Content-Type'] = 'application/json';

      if (!empty($this->token)) {

        if ($method == 'post') {

          $headers['headers']['Authorization'] = 'Bearer ' . $this->token;
          $data = ArrayHelper::merge($headers, [
            'json' => $data
          ]);
        } else {

          $url .= '?' . http_build_query($data);
          $headers['headers']['Authorization'] = 'Bearer ' . $this->token;
          $data = $headers;
        }

      } else {
        $data = [
          'form_params' => $data
        ];
      }

      if( $url == 'calculator/tarifflist') {


      }

      $response = $this->cdek->request($method, Yii::$app->params['cdekApiTest'] . $url, $data);

      $response = json_decode($response->getBody()->getContents(), true);

    }
    return $response;
  }

}

/*
 *
    $api = Yii::$app->cdek;
    $token = $api->token();

    echo 'getDeliveryCities<br><BR>';
//    $response = $api->getDeliveryRegions();
//    $response = $api->getDeliveryCities([
//      'region_code' => 81
//    ]);

    $response = $api->getDeliveryPoints([
      'postal_code' => 101000
    ]);

    $order = [
      'type' => 1,
      "number" => "ddOererre7450813980068",
      "comment" => "Новый заказ",
      "delivery_recipient_cost" => [
        "value" => 50
      ],
      "recipient" => [
        "name" => "Иванов Иван",
        "phones" => [[
          "number" => $userProfile->phone
        ]]
      ],
      "from_location" => [

        "city" => "Москва",
        "address" => "Высоковольтный проезд 1 к3, кв. 127"
      ],
      "to_location" => [

        "city" => "Новосибирск",
        "address" => "ул. Блюхера, 32"
      ],
      "sender" => [
        "name" => "Петров Петр"
      ],
      "services" => [[
        "code" => "SECURE_PACKAGE_A2"
      ]],
      "tariff_code" => 139
    ];
    $response = $api->createOrder($order);
 *
 *
 * */
