<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GoodWriteOff;
use common\Exceptions\ValidationErrorException;

class GoodWriteOffSearch extends Model
{

  public ?int $id = null;
  public ?string $name = null;


  public function rules()
  {

    return [
      [['name'], 'string'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'name' => 'Название',
      'code' => 'ШК',
      'good_write_off_status_id' => 'Статус',
    ];

  }

  public function search(?array $params = []): ActiveDataProvider
  {

    $query = GoodWriteOff::find();


    if (!$this->validate()) {

      throw ValidationErrorException::create($this->errors);
    }

    $query->andFilterWhere([
      'id' => $this->id??'',
      'name' => $this->name??'',
      'code' => $this->code??'',
    ]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 30
      ],
      'sort' => ['defaultOrder'=> ['created_at' => SORT_DESC]]
    ]);

    return $dataProvider;
  }
}
