<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 17.09.19
 * Time: 17:12
 */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Products;


class ProductsWeightGroup extends ActiveRecord {

    public $name = '';

    public static function tableName() {

        return '{{%products_weight_group}}';
    }

    public function rules() {

        return [
            [['id', 'product_id', 'group_id'], 'integer']
        ];
    }

    public function attributeLabels() {

        return [
            'product_id' => 'ID продукта',
            'group_id' => 'ID группы',
        ];

    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

//            $this->user_id = Yii::$app->user->id;
            return true;
        }
        return false;

    }

}
