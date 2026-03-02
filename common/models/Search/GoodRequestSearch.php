<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GoodRequest;
use common\Exceptions\ValidationErrorException;

class GoodRequestSearch extends Model
{

  public ?int $id = null;
  public ?string $name = null;
  public $good_request_status_id;


  public function rules()
  {

    return [
      [['good_request_status_id'], 'safe'],
      [['name'], 'string'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'name' => 'Название',
      'good_request_status_id' => 'Статус заявки',
    ];

  }

  public function search(?array $params = []): ActiveDataProvider
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {

      throw ValidationErrorException::create($this->errors);
    }

    $query = GoodRequest::find();
    $query->andFilterWhere([
      'id' => $this->id??'',
      'name' => $this->name??'',
      'code' => $this->code??''
    ]);

    if($status = $params['good_request_status_id']??false) {

      $query->andFilterWhere([
        'good_request_status_id' => $status,
      ]);
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 30
      ],
      'sort' => ['defaultOrder'=> ['updated_at' => SORT_DESC]]
    ]);

    return $dataProvider;
  }

  public function formName()
  {
    return '';
  }
}
