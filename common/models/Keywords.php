<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.02.23
 * Time: 19:25
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Keywords extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%keywords}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['title', 'page', 'meta_tag_title', 'meta_tag_keywords', 'meta_tag_description'], 'string'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'page' => 'Название страницы',
      'title' => 'Заголовок',
      'meta_tag_title' => 'Тег title',
      'meta_tag_keywords' => 'Тег keywords',
      'meta_tag_description' => 'Тег description',
    ];
  }
}
