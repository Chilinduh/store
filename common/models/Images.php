<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\imagine\Image;

class Images extends ActiveRecord {
////
//    public $id;
//    public $table_name;
//    public $table_id;
//    public $path;
//    public $size;
//    public $file;
//    public $main;
//    public $show;
//    public $created_at;
//    public $updated_at;

    public $file;

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;
    const THUMBNAIL = 'thumbnail';
    const MAIN = 'main';

    public static function tableName() {
        return '{{%images}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            [['id','table_id', 'type_id'], 'integer'],
            [['thumbnail','size','table_name', 'original'], 'string'],
            [['main'], 'boolean'],
            [['show'], 'boolean'],
            [['created_at'], 'integer'],
            [['updated_at'], 'integer'],
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg'],

        ];
    }

    public function attributeLabels() {

        return [
            'id' => 'Название',
            'size' => 'Размер',
            'main' => 'Телефон',
            'original' => 'Оригинал',
            'thumbnail' => 'Иконка',
            'type_id' => 'Иконка',
            'table_name' => 'Имя таблицы',
            'table_id' => 'ID таблицы',
            'show' => 'Статус',
            'path' => 'Путь к картинке',
            'file' => 'Email',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }
    

    public function beforeSave($insert) {

        if(parent::beforeSave($insert)) {
            $this->created_at = time(new \DateTimeZone("UTC"));
            $this->updated_at = time(new \DateTimeZone("UTC"));


            return true;
        }

        return false;
    }

    public function image($size = self::THUMBNAIL) {

        return static::findOne([
            'table_id' => $this->table_id,
            'table_name' => $this->table_name,
            'size' => $size,
        ]);

    }

    public function saveImages($image = [], $resize = ['width'=>50, 'height'=>50]) {
        
            $model = new $this;
            $model->size = isset($image['size']) ? $image['size'] : self::MAIN;
            $model->main = 0;
            $model->show = 1;
            $model->original = 1;
            $model->table_name = $image['table_name'];
            $model->table_id = $image['table_id'];
            $model->file = UploadedFile::getInstanceByName($image['file_name']);
            $model->type_id = 1;
            
            $size = getimagesize($image['file_path']);

            $width = isset($image['width']) ? $image['width'] : $size[0];
            $height = isset($image['height']) ? $image['height'] : $size[1];

            $path = $image['path'];
            $path_to_save = $image['path_to_save'];

            if(!is_dir($path)) {
                mkdir($path);
            }

            $fileName = uniqid().'.'.$model->file->getExtension();
            $model->original = strtolower($path_to_save.'/'.$fileName);

            Image::resize($model->file->tempName, $width, $height)->save($path.'/'.$fileName, ['jpeg_quality' => 50]);


            if($resize) {
                $fileName = uniqid().'.'.$model->file->getExtension();
                Image::resize($model->file->tempName, $resize['width'], $resize['height'])->save($path.'/'.$fileName, ['jpeg_quality' => 50]);
                $model->thumbnail = strtolower($path_to_save.'/'.$fileName);
            }

            $model->save(false);
            return $model;

//            Image::resize($images->file->tempName, $size[0], $size[1])->save($path . $images->id . '.jpg' , ['jpeg_quality' => 50]);
//            $images->save();
//            Image::resize($images->file->tempName, $size[0], $size[1])->save($path . $images->id . '.jpg' , ['jpeg_quality' => 50]);
//            move_uploaded_file($_FILES['User']['tmp_name']['file'], $path . $images->id.'.'.$images->file->extension);

    }

    /**
     * {@inheritdoc}
     */
    public static function getAll() {
        return static::findAll([]);
//        return static::findAll(['show' => self::STATUS_ACTIVE, 'main' => 1]);
    }

}
