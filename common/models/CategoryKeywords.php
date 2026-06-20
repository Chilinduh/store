<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_keywords".
 *
 * @property int $id
 * @property int|null $category_id Категория
 * @property string|null $meta_tag_title Заголовок
 * @property string $meta_tag_keywords Ключевые слова
 * @property string $meta_tag_description Описание
 * @property string|null $created_at Дата создания
 */
class CategoryKeywords extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_keywords';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'default', 'value' => null],
            [['category_id'], 'integer'],
            [['meta_tag_title', 'meta_tag_keywords', 'meta_tag_description'], 'string'],
            [['meta_tag_keywords', 'meta_tag_description'], 'required'],
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
            'category_id' => 'Category ID',
            'meta_tag_title' => 'Meta Tag Title',
            'meta_tag_keywords' => 'Meta Tag Keywords',
            'meta_tag_description' => 'Meta Tag Description',
            'created_at' => 'Created At',
        ];
    }
}
