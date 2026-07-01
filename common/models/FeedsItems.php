<?php

namespace common\models;

use common\models\Query\FeedsItemsQuery;
use Yii;

/**
 * This is the model class for table "feeds_items".
 *
 * @property int $id
 * @property int|null $feed_id Фид
 * @property int|null $product_id Товар
 * @property string|null $created_at Дата создания
 */
class FeedsItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feeds_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feed_id', 'product_id'], 'default', 'value' => null],
            [['feed_id', 'product_id'], 'integer'],
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
            'feed_id' => 'Feed ID',
            'product_id' => 'Product ID',
            'created_at' => 'Created At',
        ];
    }

}
