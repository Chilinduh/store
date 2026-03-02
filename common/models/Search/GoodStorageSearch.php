<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GoodStorage;
use common\Exceptions\ValidationErrorException;
use yii\db\Expression;

class GoodStorageSearch extends Model
{

  public ?int $id = null;
  public ?string $name = null;
  public $file = null;
  public ?string $term = null;
  public ?string $code = null;
  public ?int $count = 1;

  public function rules()
  {

    return [
      [['name'], 'string'],
      [['file', 'term', 'code', 'count'], 'safe'],
    ];
  }


  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'name' => 'Название',
      'code' => 'Штрих код',
      'count' => 'Количество',
    ];

  }

  public function search(?array $params = []): ActiveDataProvider
  {

    $query = GoodStorage::find();
    if (!$this->validate()) {

      throw ValidationErrorException::create($this->errors);
    }

//    $query->andFilterWhere([
//      'id' => $this->id,
      //'name' => $this->name,
//    ]);

    if($this->term = $params['term']??false) {

      $query->where(new Expression('lower(name) LIKE \'%' . mb_convert_case($this->term, MB_CASE_TITLE, "UTF-8") . '%\''));
    }

    if($this->code = $params['code']??false) {

      $query->orWhere(['=', 'code', $this->code]);
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $dataProvider;
  }

  public function formName()
  {
    return '';
  }
}
