<?php

namespace common\models;

use creocoder\nestedsets\NestedSetsBehavior;
use yii\db\ActiveRecord;
use common\models\query\CategoryQuery;

use Yii;

class CategoryNestedSets extends ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'tree';
  }


  public function behaviors(): array
  {
    return [
      'tree' => [
        'class' => NestedSetsBehavior::className(),
        //'treeAttribute' => 'tree',
        'leftAttribute' => 'lft',
        'rightAttribute' => 'rgt',
        'depthAttribute' => 'lvl',
      ],
    ];
  }

  public function transactions()
  {
    return [
      self::SCENARIO_DEFAULT => self::OP_ALL,
    ];
  }

  public static function find()
  {
    return new CategoryQuery(get_called_class());
  }


}
