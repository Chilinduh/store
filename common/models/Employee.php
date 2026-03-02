<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $name Имя
 * @property string|null $first_name Фамилия
 * @property string|null $last_name Отчество
 * @property string $phone Телефон
 * @property string $email Email
 * @property string|null $birthdate Дата рождения
 * @property int|null $show Показать/скрыть
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'phone', 'email'], 'string'],
            [['phone', 'email'], 'required'],
            [['birthdate', 'created_at', 'deleted_at'], 'safe'],
            [['show'], 'default', 'value' => null],
            [['show'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['first_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'first_name' => 'Фамилия',
            'last_name' => 'Отчество',
            'phone' => 'Телефон',
            'email' => 'Email',
            'birthdate' => 'День рождения',
            'show' => 'Показать/скрыть',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
