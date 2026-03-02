<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class CategoryType extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'describe'], 'string'],
            [['show'],'boolean']
        ];
    }

    public static function getAll()
    {
        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }

}
