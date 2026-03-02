<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.09.19
 * Time: 13:25
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Materials extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%materials}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name'], 'string'],
      [['show', 'default'], 'boolean']
    ];
  }

  public function attributeLabels()
  {
    return [
      'name' => 'Название',
      'show' => 'Показать/скрыть',
    ];
  }

  public static function getAll()
  {

    return static::findAll([]);
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

      return true;
    }
    return false;

  }

  public static function getMaterial(int $id = null)
  {
    return static::findOne($id);
  }
}
