<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Units;


class ProductMaterials extends ActiveRecord {

  /**
   * {@inheritdoc}
   */
  public static function tableName() {

    return '{{%product_materials}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {

    return [
      [['material_id', 'product_id', 'unit_id', 'value'], 'required', 'message'=> 'Не заполнено поле {attribute}.'],
      [['material_id', 'product_id', 'unit_id', 'value'], 'integer'],
    ];
  }

  public function attributeLabels() {

    return [
      'material_id' => 'Материал',
      'unit_id' => 'Единица измерения',
      'product_id' => 'Товар',
      'value' => 'Количество',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  public static function getAll() {

    return static::findAll([]);
  }

  public function getMaterial()
  {

    return $this->hasOne(Materials::class, ['id' => 'material_id']);
  }

  public function getUnit()
  {

    return $this->hasOne(Units::class, ['id' => 'unit_id']);
  }


}






