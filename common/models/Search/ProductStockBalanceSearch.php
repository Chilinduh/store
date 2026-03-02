<?php

namespace common\models\Search;

use common\models\ProductStockBalance;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\Exceptions\ValidationErrorException;

class ProductStockBalanceSearch extends Model
{

  public ?int $id = null;
  public ?int $quantity = null;
  public ?int $size_id = null;
  public ?int $product_id = null;
  public ?int $color_id = null;
  public ?int $stock_id = null;
  public ?string $created_at = null;
  public ?string $updated_at = null;

  public function rules()
  {

    return [
      [['stock_id', 'size_id', 'product_id', 'color_id', 'quantity'], 'integer'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'size_id' => 'ID пользователя',
      'color_id' => 'ID цвета',
      'stock_id' => 'ID склада',
      'product_id' => 'ID товара',
      'quantity' => 'Комментарий',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  public function search(?array $params = []): ActiveDataProvider
  {

    $query = ProductStockBalance::find(); //->where(['deleted_at' => NULL])

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 20
      ],
      'sort'       => [
        'defaultOrder' => [
          'created_at' => SORT_DESC,
        ],
      ],
    ]);

    if (!$this->validate()) {

      throw ValidationErrorException::create($this->errors);
    }

    return $dataProvider;
  }
}
