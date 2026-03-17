<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class BlocksTypes extends ActiveRecord
{

  public const BLOCK_PRODUCTS_SALE = 1; //Блок с товарами (Распродажа)
  public const BLOCK_PRODUCTS_NEW = 2; //Блок с товарами (Новинка)
  public const BLOCK_PRODUCTS_HOT = 3; //Блок с товарами (Горячее предложение)
  public const BLOCK_PRODUCTS_BEST = 4; //Блок с товарами (Лучшее предложение)
  public const BLOCK_PRODUCTS_PROMOTION = 5; //Блок с товарами (Акции)

  public const BLOCK_BANNERS_CAROUSEL = 8;
  public const BLOCK_CATEGORY_WITH_SUBCATEGORY = 9;
  public const BLOCK_FEATURES = 10;
  public const BLOCK_NEWS_V1 = 11;
  public const BLOCK_NEWS_V2 = 12;
  public const BLOCK_BANNERS_LEFT = 6;
  public const BLOCK_BANNERS_RIGHT = 7;
  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return '{{%blocks_types}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['name'], 'string'],
      [['show'], 'integer'],
      [['name'], 'required'],
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Название',
      'show' => 'Показать/скрыть',
    ];
  }


}
