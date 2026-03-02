<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Attributes;
use common\Exceptions\ValidationErrorException;

class AttributesSearch extends Model
{

  public ?int $id = null;
  public ?string $search = null;

  public function rules()
  {

    return [
      [['search'], 'string'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'name' => 'Название',
    ];

  }

  public function search(?array $params = []): ActiveDataProvider
  {

    $query = Attributes::find();

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {
      throw ValidationErrorException::create($this->errors);
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
       'sort' => [
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
        ],
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    $search = $params['search'] ?? null;
    if ($search) {

      $query->orWhere(['like', 'name', ':search', [':search' => $search]]);
    }


    //echo $query->createCommand()->getRawSql(); die;

    return $dataProvider;
  }

  public function formName() {
    return '';
  }
}
