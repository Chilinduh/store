<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Brands extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%brands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'string'],
            [['show'], 'integer'],
            [['name'], 'required'],
            ['name', 'unique', 'targetAttribute' => ['name', 'external']]
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Название',
            'show' => 'Показать/скрыть',
        ];
    }

    public static function Brands() {

        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            return true;
        }
        return false;
    }
}
