<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Images;
use common\models\City;
use common\models\ProductItemPrices;


class ProductItems extends ActiveRecord {
    
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;
    public $notUseAfrefind = false;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        
        return '{{%product_items}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['name', 'description'], 'string'],
            [['show'],'boolean'],
            [['id', 'city_id', 'price', 'weight', 'product_id', 'updated_at', 'created_at'],'integer'],
            [['name'], 'required'],            
        ];
    }

    public function attributeLabels() {

        return [
            'name' => 'Название',
            'product_id' => 'Продукт',
            'city_id' => 'Город',
            'description' => 'Описание',
            'weight' => 'Вес',
            'quantity' => 'Количество',
            'code' => 'Код',
            'price' => 'Цeна',
            'show' => 'Показать/скрыть',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function getImages() {

        return $this->hasMany(Images::className(), ['table_id'=>'id'])->andWhere(['table_name'=>'product','size' => Images::MAIN])->all();
    }
    
    public function getPrices() {

        return $this->hasMany(ProductItemPrices::className(), ['product_item_id'=>'id']);
    }

    public function getCity() {

        return $this->hasOne(City::className(), ['id'=>'city_id'])->one();
    }

    public function getProduct() {

        return $this->hasOne(Products::className(), ['id'=>'product_id'])->one();
    }
    
    public static function getAll() {

        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }
    
    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            $this->show = $this->show == 'on' ? 1 : 0;
            $this->created_at = time(new \DateTimeZone("UTC"));
            $this->updated_at = time(new \DateTimeZone("UTC"));
            return true;
        }
        return false;

    }        
        
    public function afterFind()	{
        
        if (!$this->notUseAfrefind) {	
//            $model = $this->hasMany(ProductItemPrices::className(), ['product_item_id' => 'id'])
//                    ->viaTable(Prices::className(), ['id' => 'product_item_prices.price_id'])
//                    ->orderBy(['id'=>SORT_DESC]);
//            
//            print_r($this); die;
//                  
//            $this->price =  1;
        }

        parent::afterFind();
    }

}
