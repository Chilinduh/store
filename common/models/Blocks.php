<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\BlocksTypes;
use common\models\Pages;


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
      [['group_id', 'show'], 'safe'],
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Название',
      'show' => 'Показать/скрыть',
      'page_id' => 'Страница',
      'block_type_id' => 'Тип блока',
      'block_group_id' => 'Группа',
    ];
  }

  public function getType()
  {

    return $this->hasOne(BlocksTypes::class, ['id' => 'block_type_id']);
  }

  public function getPage()
  {

    return $this->hasOne(Pages::class, ['id' => 'page_id']);
  }


  public function getFiles()
  {

    return $this->hasOne(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'blocks']);
  }
  public function getBanners()
  {

    return $this->hasOne(BlocksBanners::class, ['block_id' => 'id']);
  }



}
