<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\imagine\Image;

class Files extends ActiveRecord
{

  public $file;

  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;
  const THUMBNAIL = 'thumbnail';
  const MAIN = 'main';

  public static function tableName()
  {
    return '{{%files}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {

    return [
      [['id', 'table_id', 'file_type_id'], 'integer'],
      [['thumbnail', 'size', 'table_name', 'original'], 'string'],
      [['main'], 'boolean'],
      [['show'], 'boolean'],
      [['file'], 'file', 'extensions' => 'png, jpg, jpeg'],

    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'Название',
      'size' => 'Размер',
      'main' => 'Главное изображение',
      'original' => 'Оригинал',
      'thumbnail' => 'Иконка',
      'file_type_id' => 'Тип файла',
      'table_name' => 'Имя таблицы',
      'table_id' => 'ID таблицы',
      'show' => 'Статус',
      'path' => 'Путь к картинке',
      'file' => 'Email',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

      return true;
    }

    return false;
  }

  public function file($size = self::THUMBNAIL)
  {

    return static::findOne([
      'table_id' => $this->table_id,
      'table_name' => $this->table_name,
      'size' => $size,
    ]);

  }

  public function saveFiles($file = [], $resize = ['width' => 50, 'height' => 50])
  {

    if (isset($file['replace'])) {
      $model = static::find()->where(['table_name' => $file['table_name'], 'table_id' => $file['table_id']])->one();
      if (!$model) {
        $model = new $this;
      }
    } else {
      $model = new $this;
    }

    $model->size = $file['size'] ?? self::MAIN;
    $model->main = 0;
    $model->show = 1;
    $model->table_name = $file['table_name'];
    $model->table_id = $file['table_id'];
    $model->file = UploadedFile::getInstanceByName($file['file_name']);
    $model->file_type_id = 1;

    $size = getimagesize($file['file_path']);

    $width = $file['width'] ?? $size[0];
    $height = $file['height'] ?? $size[1];

    $path = $file['path'];
    $path_to_save = $file['path_to_save'];

    if (!is_dir($path)) {
      mkdir($path);
    }

    $fileName = uniqid() . '.' . $model->file->getExtension();
    $model->original = strtolower($path_to_save . '/' . $fileName);

    Image::resize($model->file->tempName, $width, $height)->save($path . '/' . $fileName, ['jpeg_quality' => 50]);
    if ($resize) {

      $fileName = uniqid() . '.' . $model->file->getExtension();
      Image::resize($model->file->tempName, $resize['width'], $resize['height'])->save($path . '/' . $fileName, ['jpeg_quality' => 50]);
      $model->thumbnail = strtolower($path_to_save . '/' . $fileName);
    }

    return $model->save(false);
  }

  /**
   * {@inheritdoc}
   */
  public static function getAll()
  {
    return static::findAll([]);
//        return static::findAll(['show' => self::STATUS_ACTIVE, 'main' => 1]);
  }

}
