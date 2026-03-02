<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class BlocksGroups extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%blocks_groups}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['block_id', 'group_id'], 'required'],
      [['block_id', 'group_id'], 'integer'],
    ];
  }

  public function getBlockCategory()
  {

    return $this->hasMany(CategoryGroups::className(), ['group_id' => 'group_id']);
  }

  public function getCategory()
  {

    return $this->hasMany(Category::className(), ['id' => 'category_id'])->via('blockCategory');
  }

}
