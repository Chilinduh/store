<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.10.19
 * Time: 16:01
 */

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\ActiveQueryInterface;


class SearchWords extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%search_words}}';
  }


  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['word', 'ip'], 'string'],
      [['user_id'], 'integer'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'user_id' => 'Пользователь',
      'ip' => 'IP',
      'word' => 'Поисковое слово',
      'created_at' => 'Дата создания',
    ];
  }

  public static function getWords()
  {

    return static::findAll();
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;
  }
}







