<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee_schedule".
 *
 * @property int $id
 * @property int $employee_id ID сотрудника
 * @property string|null $date Дата
 * @property int|null $hours Показать/скрыть
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class EmployeeSchedule extends \yii\db\ActiveRecord
{

  public $month = null;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id', 'hours'], 'default', 'value' => null],
            [['employee_id'], 'integer'],
            [['hours'], 'string'],
            [['date', 'created_at', 'deleted_at', 'month'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Сотрудник',
            'date' => 'Дата',
            'hours' => 'Часы',
            'month' => 'Месяц',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
