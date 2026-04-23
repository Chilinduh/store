<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_imports_data".
 *
 * @property int $id
 * @property int|null $product_import_id Импорт
 * @property int|null $product_id Товар
 * @property string|null $source Источник
 * @property string|null $data данные
 * @property string|null $created_at Дата создания
 */
class ProductsImportsData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_imports_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_import_id', 'product_id'], 'default', 'value' => null],
            [['product_import_id', 'product_id'], 'integer'],
            [['source', 'data'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_import_id' => 'Product Import ID',
            'product_id' => 'Product ID',
            'source' => 'Source',
            'data' => 'Data',
            'created_at' => 'Created At',
        ];
    }
}
