<?php

namespace common\models\Forms\OrderForm;

use Yii;
use yii\base\Model;

class OrderForm extends Model
{
  public ?int $id = null;
  public int $quantity = 1;


  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id', 'quantity'], 'integer'],
      [['id', 'quantity'], 'safe'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'Товар',
      'quantity' => 'Количество',
    ];
  }

  public function formName()
  {
    return '';
  }

}
