<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
create table pets (
id integer NOT NULL DEFAULT nextval('pets_id_seq'::regclass) ,
name varchar(255) not null,
show numeric null,
constraint pk_pets primary key (id)
);

*/

class Pets extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pets}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string'],
            [['show'], 'boolean'],
            [['name'], 'required','on' => 'odinStask', 'message' => 'Поле {attribute} - является обязательным'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function Pets()
    {
        return static::findAll(['show' => self::STATUS_ACTIVE]);
    }

}
