<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class UserProfile extends ActiveRecord {


  public static function tableName() {

    return '{{%user_profile}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {

    return [
      [['id'], 'integer'],
      [['user_id'], 'integer'],
      [['country', 'city', 'address'], 'string'],
      [['country', 'city', 'address'], 'required'],
      [['phone', 'last_name', 'first_name', 'address'], 'string'],
    ];
  }

  public function attributeLabels() {

    return [
      'id' => 'id',
      'user_id' => 'user_id',
      'first_name' => 'Фамилия',
      'last_name' => 'Имя',
      'phone' => 'Телефон',
      'country' => 'Страна',
      'city' => 'Город',
      'address' => 'Адрес',
    ];
  }

  public function getProfile() {

    $user = Yii::$app->user->getIdentity();
    return self::findOne(['user_id' => $user->id]);
  }

  public function beforeSave($insert) {

    if(parent::beforeSave($insert)) {

      $user = Yii::$app->user->getIdentity();
      $this->user_id = $user->id;
      return true;
    }

    return false;
  }

}
