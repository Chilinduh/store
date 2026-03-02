<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Review extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%review}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['id', 'name', 'user_id', 'city_id', 'product_id'], 'integer'],
            [['positive','negative',], 'string']
        ];
    }

    public function attributeLabels() {

        return [
            'user_id' => 'Пользователь',
            'name' => 'Имя',
            'city_id' => 'Город',
            'product_id' => 'Товар',
            'positive' => 'Положительные стороны',
            'negative' => 'Отрицательные стороны',
        ];
        
    }
    
    public function review() {

        return static::find();
    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

//            $this->user_id = Yii::$app->user->id;
            $this->created_at = time(new \DateTimeZone("UTC"));
            $this->updated_at = time(new \DateTimeZone("UTC"));
            return true;
        }
        return false;

    }

}
