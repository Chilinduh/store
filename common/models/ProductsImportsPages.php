<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_imports_pages".
 *
 * @property int $id
 * @property int|null $product_import_id Импорт
 * @property string|null $url Урл страницы
 * @property string $html Содержимое страницы
 * @property string|null $created_at Дата создания
 */
class ProductsImportsPages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_imports_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_import_id'], 'default', 'value' => null],
            [['product_import_id'], 'integer'],
            [['url', 'html'], 'string'],
            [['html'], 'required'],
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
            'url' => 'Url',
            'html' => 'Html',
            'created_at' => 'Created At',
        ];
    }
}
