<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Blocks extends ActiveRecord
{

  public $group_id = '';

  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%blocks}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['name'], 'string'],
      [['page_id', 'block_type_id'], 'integer'],
      [['name'], 'required'],
      [['group_id'], 'safe'],
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Название',
      'page_id' => 'Страница',
      'block_type_id' => 'Тип блока',
      'block_group_id' => 'Группа',
    ];
  }


}
