<?php

namespace common\models\Forms;

use yii\base\Model;

class EmployeeScheduleForm extends Model
{

  public $date;

  public function attributeLabels()
  {
    return [
      'date' => 'Дата',
    ];
  }

  public function rules()
  {
    return [
      [['date'], 'string', 'max' => 255],
    ];
  }

  public function formName()
  {
    return '';
  }
}
