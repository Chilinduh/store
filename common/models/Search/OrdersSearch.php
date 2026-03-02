<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;
use common\Exceptions\ValidationErrorException;

class OrdersSearch extends Model
{

  public ?int $id = null;
  public ?int $status_id = null;
  public ?int $user_id = null;
  public ?int $product_id = null;
  public ?int $comment = null;
  public ?string $created_at = null;
  public ?string $updated_at = null;

  public function rules()
  {

    return [
      [['comment'], 'string'],
      [['user_id', 'status_id', 'product_id'], 'integer'],
    ];
  }


  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'user_id' => 'ID пользователя',
      'status_id' => 'ID статуса',
      'product_id' => 'ID товара',
      'comment' => 'Комментарий',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  public function search(?array $params = []): ActiveDataProvider
  {

    $query = Orders::find(); //->where(['deleted_at' => NULL])

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
