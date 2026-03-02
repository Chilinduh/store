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


class NewsCategory extends ActiveRecord
{

  const STATUS_INACTIVE = 0;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%news_category}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id'], 'integer'],
      [['name'], 'string'],
      [['show'],'boolean'],
    ];
  }


  public function attributeLabels() {

    return [
      'name' => 'Название',
      'show' => 'Показать/Скрыть',

    ];
  }

  public static function getAll()
  {
    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

}







