<?php

namespace common\models;

use \common\models\Attributes;

use Yii;

/**
 * This is the model class for table "product_attributes".
 *
 * @property int $id
 * @property int $attribute_id Аттрибут
 * @property int $attribute_group_id Группа аттрибутов
 * @property int|null $show Показать/скрыть
 */
class ProductAttributes extends \yii\db\ActiveRecord
{

  public $attributes = null;
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'product_attributes';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['attribute_id', 'attribute_group_id', 'show'], 'integer'],
      [['attributes'], 'safe'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'attribute_id' => 'Аттрибут',
      'attribute_group_id' => 'Группа атрибутов',
      'show' => 'Показать/скрыть',
    ];
  }

  public function getAttribute($id)
  {

    $attributes = new Attributes();
    $attribute = $attributes->findOne($id);

    return $attribute->name;
  }

  public function formName()
  {
    return '';
  }
}
