<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good_write_off_status".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int|null $show Показать/скрыть
 */
class GoodWriteOffStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_write_off_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['show'], 'default', 'value' => null],
            [['show'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'show' => 'Show',
        ];
    }
}
