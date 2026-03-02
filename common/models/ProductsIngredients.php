<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class ProductsIngredients extends ActiveRecord {
    
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;
    public $notUseAfrefind = false;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        
        return '{{%products_ingredients}}';
    }


    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [            
            [['id', 'product_id', 'ingredient_id'],'integer'],
        ];
    }

    public function attributeLabels() {

        return [
            'product_id' => 'Продукт',
            'ingredient_id' => 'Ингредиент',
        ];
    }
        

    public static function getAll() {

        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }
   

}
