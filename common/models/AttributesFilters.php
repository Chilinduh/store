<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attributes_filters".
 *
 * @property int $id
 * @property string|null $name Наименование
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class AttributesFilters extends \yii\db\ActiveRecord
{

    const SLIDER = 1;
    const CHECKBOX = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attributes_filters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at'], 'safe'],
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
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public static function Filters() {

        return static::find()->all();
    }
}
