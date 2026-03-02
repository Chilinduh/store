<?php

namespace common\models\Search;

use common\models\CargoGoodRoute;
use common\models\Category;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CargoRequest;
use common\Exceptions\ValidationErrorException;
use common\models\CargoGoodRouteDirection;
use yii\db\Expression;

class CargoRequestSearch extends Model
{

  public $address_from = null;
  public $address_to = null;
  public $route_start = null;
  public $route_end = null;
  public $client_price = null;
  public $carrier_price = null;
  public $tonnage = null;
  public $palletage = null;
  public $counterparty_id = null;
  public ?string $term = null;
  public $pagination = 20;

  public function rules()
  {

    return [
      [['counterparty_id', 'address_from', 'term', 'address_to', 'route_start', 'route_end', 'client_price', 'carrier_price', 'tonnage', 'palletage'], 'safe'],
    ];
  }

  public function search($params)
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {
      throw ValidationErrorException::create($this->errors);
    }

    $query = CargoRequest::find();
    $query->leftJoin(CargoGoodRoute::tableName(), 'cargo_good_route.good_id = cargo_request.good_id');
    $query->leftJoin(CargoGoodRouteDirection::tableName(), 'cargo_good_route_direction.good_route_id = cargo_good_route.id');

    $addressFrom = $params['address_from'] ?? null;
    if ($addressFrom) {

      $query->andWhere(['or',
          'cargo_good_route_direction.address_start LIKE \'%' . mb_convert_case($addressFrom, MB_CASE_LOWER, "UTF-8") . '%\'',
          'cargo_good_route_direction.address_start LIKE \'%' . mb_convert_case($addressFrom, MB_CASE_TITLE, "UTF-8") . '%\'',
        ]
      );
    }

    $addressTo = $params['address_to'] ?? null;
    if ($addressTo) {

      $query->andWhere(['or',
          'cargo_good_route_direction.address_end LIKE \'%' . mb_convert_case($addressTo, MB_CASE_LOWER, "UTF-8") . '%\'',
          'cargo_good_route_direction.address_end LIKE \'%' . mb_convert_case($addressTo, MB_CASE_TITLE, "UTF-8") . '%\'',
        ]
      );
    }

    $routeStart = $params['route_start'] ?? null;
    if ($routeStart) {

      $query->andWhere(['or',
          'cargo_good_route.city_start LIKE \'%' . mb_convert_case($routeStart, MB_CASE_LOWER, "UTF-8") . '%\'',
          'cargo_good_route.city_start LIKE \'%' . mb_convert_case($routeStart, MB_CASE_TITLE, "UTF-8") . '%\'',
        ]
      );
    }

    $routeEnd = $params['route_end'] ?? null;
    if ($routeEnd) {

      $query->andWhere(['or',
          'cargo_good_route.city_end LIKE \'%' . mb_convert_case($routeEnd, MB_CASE_LOWER, "UTF-8") . '%\'',
          'cargo_good_route.city_end LIKE \'%' . mb_convert_case($routeEnd, MB_CASE_TITLE, "UTF-8") . '%\'',
        ]
      );
    }

    $palletage = $params['palletage'] ?? null;
    if ($palletage) {

      $query->andWhere(['>=', 'palletage', intval($palletage)]);
    }

    $tonnage = $params['tonnage'] ?? null;
    if ($tonnage) {

      $query->andWhere(['>=', 'tonnage', $tonnage]);
    }

    $query->andFilterWhere([
      'counterparty_id' => $this->counterparty_id
    ]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => $this->pagination
      ],
      'sort' => ['attributes' => ['id']]
    ]);

    return $dataProvider;
  }

  public function formName()
  {
    return '';
  }


  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'number' => '№ заказа',
      'address_from' => 'Адрес первой погрузки',
      'address_to' => 'Адрес последней выгрузки',
      'route_start' => 'Старт маршрута',
      'route_end' => 'Конец маршрута',
      'price' => 'Клиент платит',
      'tonnage' => 'Тоннаж, кг',
      'palletage' => 'Паллетаж, пал',
      'created_at' => 'Created At',
      'deleted_at' => 'Deleted At',
    ];

  }

}
