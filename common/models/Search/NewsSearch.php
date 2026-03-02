<?php

namespace common\models\Search;

use common\Exceptions\ValidationErrorException;
use common\models\News;
use common\models\NewsCategory;
use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\data\Sort;

class NewsSearch extends ActiveRecord
{

  const STATUS_ACTIVE = 1;

  public ?string $category = '';

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%news}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['category_id', 'id'], 'integer'],
      [['category'], 'integer'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'category_id' => 'category_id',
      'category' => 'category',
    ];
  }

  public function search(?array $params = []): ActiveDataProvider
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {

      throw ValidationErrorException::create($this->errors);
    }

    $query = News::find()
      ->select(['news.id', 'title', 'date', 'announce', 'category_id', 'name'])
      ->leftJoin(NewsCategory::tableName(), 'news_category.id = category_id');

    $query->andFilterWhere([
      'id' => $this->id,
      'category_id' => $this->category_id,
    ]);

    return new ActiveDataProvider([
      'query' => $query,
      'pagination' => false,
      'sort' => [
        'defaultOrder' => [
          'date' => SORT_DESC,
        ],
      ],
    ]);
  }

  public function formName()
  {
    return '';
  }
}
