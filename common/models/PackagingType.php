<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class PackagingType extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%packaging_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string'],
            [['show'],'boolean'],
        ];
    }
    
    
    public function attributeLabels() {

        return [
            'name' => 'Название',
            'show' => 'Показать/Скрыть',
            
        ];
    }

    public static function getAll()
    {
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
