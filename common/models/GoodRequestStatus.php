<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good_request_status".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int|null $show Показать/скрыть
 */
class GoodRequestStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_request_status';
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
