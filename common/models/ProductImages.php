<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Images;


class ProductImages extends ActiveRecord {

    public $notUseAfrefind = false;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        
        return '{{%product_images}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['id', 'image_id', 'product_id'],'integer'],
        ];
    }

    public function attributeLabels() {

        return [
            'image_id' => 'ID изображения',
            'product_id' => 'ID товара',
        ];
    }
    
    public function getImages() {

        return $this->hasMany(Images::className(), ['id'=>'image_id'])->andWhere(['table_name'=>'product','size' => Images::MAIN])->all();
    }
    


    public static function getAll() {

        return static::findAll(['show' => self::STATUS_ACTIVE]);
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
