<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class UserPasswordRestore extends ActiveRecord {

  public function beforeSave($insert) {

    if(parent::beforeSave($insert)) {

      return true;
    }

    return false;
  }

  public function getProduct() {

    return $this->hasOne(Products::class, ['id' => 'product_id']);

  }

  public static function tableName() {

    return '{{%user_password_restore}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {

    return [
      [['id'], 'integer'],
      [['user_id'], 'integer'],
      [['product_id'], 'integer'],
    ];
  }

  public function attributeLabels() {

    return [
      'id' => 'id',
      'user_id' => 'user_id',
      'product_id' => 'product_id',
    ];
  }
}
