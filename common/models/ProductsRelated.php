<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_related".
 *
 * @property int $id
 * @property int|null $product_id Товар
 * @property int|null $product_related_id Сопутствующий товар
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class ProductsRelated extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_related';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_related_id'], 'default', 'value' => null],
            [['product_id', 'product_related_id'], 'integer'],
            [['created_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'product_related_id' => 'Сопутствующий товар',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
