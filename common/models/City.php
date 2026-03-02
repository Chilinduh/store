<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.09.19
 * Time: 13:25
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class City extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%city}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'string'],
            [['show'], 'boolean']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Название',
            'show' => 'Показать/скрыть',
        ];
    }

    public static function getAll() {

        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            return true;
        }
        return false;

    }


}
