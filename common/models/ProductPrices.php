<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class ProductPrices extends ActiveRecord {

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {

        return '{{%product_prices}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['show'],'boolean'],
            [['id', 'price', 'product_id', 'created_at', 'deleted_at'], 'integer'],
        ];
    }

    public function attributeLabels() {

        return [
            'product_id' => 'Продукт',
            'price' => 'Цена',
            'show' => 'Показать/скрыть',
            'created_at' => 'Дата создания',
            'deleted_at' => 'Дата удаления',
        ];
    }

    public static function getAll() {

        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            $this->show = $this->show == 'on' ? 1 : 0;
            return true;
        }
        return false;
    }
}
