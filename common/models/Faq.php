<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.09.19
 * Time: 13:25
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Faq extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%faq}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['title', 'text'], 'string'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'title' => 'Название',
      'text' => 'Описание',
      'show' => 'Показать/скрыть',
    ];
  }

  public static function getAll()
  {

    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

}
