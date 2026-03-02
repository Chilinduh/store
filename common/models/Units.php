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


class Units extends ActiveRecord {

  /**
   * {@inheritdoc}
   */
  public static function tableName() {

    return '{{%units}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {

    return [
      [['name'], 'string'],
      [['show'],'boolean'],
    ];
  }

  public function attributeLabels() {

    return [
      'name' => 'Ед. измерения',
    ];
  }

  public static function getAll() {

    return static::findAll([]);
  }
}






