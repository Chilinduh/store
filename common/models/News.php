<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.02.23
 * Time: 16:01
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class News extends ActiveRecord
{

  const STATUS_INACTIVE = 0;
  const STATUS_ACTIVE = 1;

  public $file;

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
      [['id', 'category_id'], 'integer'],
      [['title', 'announce', 'text', 'date'], 'string'],
      [['show'],'boolean'],
      [['file'], 'file', 'extensions' => 'jpg, jpeg'],
    ];
  }

  public function attributeLabels() {

    return [
      'name' => 'Название',
      'show' => 'Показать/Скрыть',
      'announce' => 'Анонс',
      'data' => 'Дата',
      'category_id' => 'Категория',
      'text' => 'Содержание',
      'title' => 'Заголовок',
      'file' => 'Изображение',
      'date' => 'Дата'
    ];
  }

  public  function getCategory()
  {

    return $this->hasOne(NewsCategory::class,  ['id' => 'category_id']);
  }

  public function getFiles()
  {

    return $this->hasOne(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'news']);
  }

  public static function getAll()
  {

    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }
}







