<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feeds_types".
 *
 * @property int $id
 * @property string|null $name Название
 * @property string|null $created_at Дата создания
 */
class FeedsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feeds_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
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
        ];
    }

    /**
     * {@inheritdoc}
     * @return FeedsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedsTypesQuery(get_called_class());
    }
}
