<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\imagine\Image;


class UserImages extends ActiveRecord {

    const THUMBNAIL = 'thumbnail';
    const MAIN = 'main';

    public function beforeSave($insert) {

        if(parent::beforeSave($insert)) {

            return true;
        }

        return false;
    }

    public function thumbnail() {

        return $this->hasOne(Images::className(), ['id' => 'image_id']);
    }

    public static function tableName() {

        return '{{%user_images}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['id'], 'integer'],
            [['user_id'], 'integer'],
            [['image_id'], 'integer'],
        ];
    }

    public function attributeLabels() {

        return [
            'id' => 'id',
            'user_id' => 'user_id',
            'image_id' => 'image_id',

        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getAll() {
        return static::findAll([]);
//        return static::findAll(['show' => self::STATUS_ACTIVE, 'main' => 1]);
    }

}
