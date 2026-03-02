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


class OrdersStatusColors extends ActiveRecord
{

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%orders_status_colors}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'color'], 'string'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'name' => 'Название',
      'color' => 'Цвет',
    ];
  }

  public static function Colors()
  {
    return static::find()->all();
  }

  public static function getColor(int $id = null)
  {
    return static::findOne($id);
  }
}
