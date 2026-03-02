<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Category;
use common\models\Groups;

class CategoryGroups extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%category_groups}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['category_id'], 'required'],
      [['category_id', 'group_id'], 'integer'],
    ];
  }


  public function attributeLabels()
  {
    return [
      'category_id' => 'Категория',
      'group_id' => 'Группа',
      'show' => 'Показать/скрыть',
    ];
  }

  public function getGroup()
  {

    return $this->hasOne(Groups::className(), ['id' => 'group_id']);
  }



  public function getCategory()
  {

    return $this->hasOne(Category::className(), ['id' => 'category_id']);
  }


}
