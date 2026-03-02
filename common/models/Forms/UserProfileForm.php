<?php

namespace common\models\Forms;

use common\models\UserProfile;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class UserProfileForm extends Model
{
  public String $first_name;
  public String $last_name;
  public String $phone;
  public String $email;

  /**
   * @var \common\models\User
   */
  private $_user;

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      ['user_id', 'required'],
      ['first_name', 'last_name', 'phone', 'address', 'string'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'first_name' => 'Фамилия',
      'last_name' => 'Имя',
      'phone' => 'Телефон',
      'city' => 'Телефон',
      'country' => 'Телефон',
      'address' => 'Адрес',
    ];
  }

  /**
   * Finds user by [[email]]
   *
   * @return OptUser|null
   */
  protected function getUser()
  {
    if (null === $this->_user) {
      $this->_user = Yii::$app->user->identity;
    }

    return $this->_user;
  }

}
