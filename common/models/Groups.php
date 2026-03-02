<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Groups extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {

    return '{{%groups}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {

    return [
      [['name'], 'required'],
      [['name', 'description'], 'string'],
      [['id'], 'integer']
    ];
  }


  public function attributeLabels()
  {
    return [
      'name' => 'Название',
      'description' => 'Описание',
      'show' => 'Показать/скрыть',
    ];
  }


  public function getProductsInGroup($params = false)
  {

    $params = $params ? $params : [];

    return ProductsWeightGroup::find()
      ->where(['group_id' => $this->id]);

    return $this->hasMany(ProductsWeightGroup::className(), ['group_id' => 'id']);

  }

  public function getProductsInColorGroup($params = false)
  {

    $params = $params ? $params : [];

    return ProductsColorGroup::find()
      ->where(['group_id' => $this->id]);

    return $this->hasMany(ProductsColorGroup::className(), ['group_id' => 'id']);

  }


  public function getProductsInWeightGroup($params = false)
  {

    $params = $params ? $params : [];

    return ProductsWeightGroup::find()
      ->where(['group_id' => $this->id]);

    return $this->hasMany(ProductsWeightGroup::className(), ['group_id' => 'id']);

//
//        return static::find()->leftJoin('products_ballance', 'products_ballance.product_id = products.id')
//            ->where(['>', 'products_ballance.quantity', 0])
//            ->andWhere(['products_ballance.city_id' => $settiongs ? $settiongs->city_id : 1])
//            ->andWhere(['products_ballance.show' => self::STATUS_ACTIVE]);
  }


  public function getWeigthProducts($params = false)
  {

    $params = $params ? $params : [];

    return Products::find()
      ->leftJoin('products_weight_group', 'products_weight_group.product_id = products.id')
      ->where(['products_weight_group.group_id' => $this->id])
      ->andWhere($params);

  }

  public function getColorProducts($params = false)
  {

    $params = $params ? $params : [];

    return Products::find()
      ->leftJoin('products_color_group', 'products_color_group.product_id = products.id')
      ->where(['products_color_group.group_id' => $this->id])
      ->andWhere($params);

  }


  public static function getAllWeightGroup($settiongs = false)
  {

    return static::find();

    return static::find()
      ->leftJoin('products_weight_group', 'products_weight_group.group_id = groups.id')
      ->leftJoin('products', 'products.id = products_weight_group.product_id')
      ->leftJoin('product_balance', 'product_balance.product_id = products.id')
      ->andWhere(['product_balance.city_id' => $settiongs ? $settiongs->city_id : 1]);
  }

  public static function getAllColorGroup($settiongs = false)
  {

    return static::find()
      ->rightJoin('products_weight_group', 'groups.id != products_weight_group.group_id');
  }
}
