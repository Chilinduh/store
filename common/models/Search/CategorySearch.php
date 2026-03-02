<?php

namespace common\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;
use common\Exceptions\ValidationErrorException;

class CategorySearch extends Model
{

  public ?int $id = null;
  public ?string $name = null;
  public ?int $parent_id = null;
  public ?int $sub_id = null;
  public ?int $show = null;
  public ?string $created_at = null;
  public ?string $updated_at = null;

  public function rules()
  {

    return [
      [['name'], 'string'],
      [['parent_id', 'sub_id'], 'integer'],
      [['show'], 'boolean'],
      [['sub_id'], 'safe'],
    ];
  }


  public function attributeLabels()
  {

    return [
      'id' => 'ID',
      'name' => 'Название',
      'parent_id' => 'Категория',
      'show' => 'Пок./скрыть',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];

  }

  public function search(?array $params = []): ActiveDataProvider
  {


    $query = Category::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    if (!$this->validate()) {

      throw ValidationErrorException::create($this->errors);
    }

    $query->andFilterWhere([
      'id' => $this->id,
      'name' => $this->name,
      'parent_id' => $this->parent_id,
      'sub_id' => $this->sub_id,
    ]);

    return $dataProvider;
  }
}
