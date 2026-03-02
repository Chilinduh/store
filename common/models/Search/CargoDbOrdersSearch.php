<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CargoDbOrders;
use common\Exceptions\ValidationErrorException;
use yii\db\Expression;

class CargoDbOrdersSearch extends Model
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
  public $pagination = 50;

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

    $query = CargoDbOrders::find();

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
      'client_price' => 'Клиент платит',
      'carrier_price' => 'Оплата перевозчику',
      'tonnage' => 'Тоннаж, кг',
      'palletage' => 'Паллетаж, пал',
      'created_at' => 'Created At',
      'deleted_at' => 'Deleted At',
    ];

  }

}
