<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;


class Menu extends \kartik\tree\models\Tree
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%admin_menu}}';
  }

  public function rules() {

    $rules = parent::rules();

    $rules[] = ['url', 'string'];

    return $rules;
  }
  public function attributeLabels() {

    return [
      'url' => 'УРЛ'
    ];
  }
}
