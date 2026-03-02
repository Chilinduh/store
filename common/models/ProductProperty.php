<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 17.09.19
 * Time: 17:12
 */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class ProductProperty extends ActiveRecord {


  public static function tableName() {

    return '{{%product_property}}';
  }

  public function rules() {

    return [
      [['id', 'product_id', 'property_id'], 'integer']
    ];
  }

  public function attributeLabels() {

    return [
      'product_id' => 'ID продукта',
      'property_id' => 'ID свойство',
    ];

  }


}
