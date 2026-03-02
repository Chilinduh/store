<?php

namespace common\models\Forms\OrderForm;

use Yii;
use yii\base\Model;

class OrderFormExtended extends Model
{

  public int $id;
  public int $quantity = 1;
  public ?int $color_id;
  public ?int $size_id;

  /**
   * {@inheritdoc}
   */
  public function __construct()
  {

    $this->quantity = 1;
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {

    return [
      [['id', 'quantity'], 'integer'],
      [['id', 'quantity'], 'required'],
      [['id', 'quantity', 'color_id', 'size_id'], 'safe'],
      [['quantity'], 'default', 'value' => 1],
//      ['size', 'filter', 'filter' => 'checkSize']
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
      'color_id' => 'Цвет',
      'size_id' => 'Размер',
    ];
  }

  function checkSize()
  {

    return true;

  }

  public function formName()
  {
    return '';
  }
}
