<?php

namespace common\models;

use common\models\Query\FeedsQuery;
use Yii;

/**
 * This is the model class for table "feeds".
 *
 * @property int $id
 * @property string|null $name Название
 * @property int|null $type_id Тип фида
 * @property string|null $created_at Дата создания
 */
class Feeds extends \yii\db\ActiveRecord
{


    public $product_id = [];
    public $product_creative_id = [];
    

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feeds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id'], 'default', 'value' => null],
            [['type_id'], 'integer'],
            [['created_at', 'product_id', 'product_creative_id'], 'safe'],
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
            'name' => 'Название фида',
            'type_id' => 'Тип фида (По умолчанию Yandex)',
            'product_id' => 'Товары для фида',
            'product_creative_id' => 'Товары с креативами',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FeedsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedsQuery(get_called_class());
    }
}
