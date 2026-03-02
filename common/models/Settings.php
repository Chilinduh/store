<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Settings extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
                [['id', 'user_id', 'city_id', 'stock_id'], 'integer']
        ];
    }

    public function attributeLabels() {

        return [
            'user_id' => 'Пользователь',
            'city_id' => 'Город',
            'stock_id' => 'Склад по умолчанию',
        ];
        
    }
    
    public function city() {
       
        return $this->hasOne(City::className(), ['id'=>'city_id'])->one();
    }
        
    
    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            $this->user_id = Yii::$app->user->id;
            return true;
        }
        return false;

    }

}
