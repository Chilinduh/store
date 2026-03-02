<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Pages extends ActiveRecord
{

    public const PAGE_MAIN = 1;
    public const PAGE_NEWS = 2;
    public const PAGE_CATALOG = 3;
    public const PAGE_DELIVERY = 4;
    public const PAGE_CONTACTS = 5;
    public const PAGE_ABOUT = 6;
    public const PAGE_FAQS = 7;
    public const PAGE_TERMS = 8;

  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%pages}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['name', 'text', 'url'], 'string'],
      [['show'], 'integer'],
      [['name'], 'required'],
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Название',
      'url' => 'Адрес страницы',
      'text' => 'Описание',
      'show' => 'Показать/скрыть',
    ];
  }


}
