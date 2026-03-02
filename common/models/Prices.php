<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class Prices extends ActiveRecord {
    
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;
    public $notUseAfrefind = false;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        
        return '{{%prices}}';
    }

    
    public function price($size = self::THUMBNAIL) {

        return static::findOne([
            'id' => $this->price_id,
        ]);

    }
    
    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['show'],'boolean'],
            [['id', 'value', 'updated_at', 'created_at'],'integer'],
        ];
    }

    public function attributeLabels() {

        return [
            'value' => 'Цена',
            'show' => 'Показать/скрыть',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
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
        
        if (!$this->notUseAfrefind){	

//            $this->created_at
        }

        parent::afterFind();
    }

}






