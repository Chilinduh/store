<?php

namespace common\models;

use common\models\Files;
use Yii;

class Tree extends \kartik\tree\models\Tree
{
  /**
   * @inheritdoc
   */
  public const LVL_ZERO = 0;
  public const LVL_ONE = 1;
  public const LVL_TWO = 2;

  public $file = null;

  public static function tableName()
  {
    return 'category';
  }

  public function rules() {

    $rules = parent::rules();

    $rules[] = [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'];

    return $rules;
  }

  public function attributeLabels() {

    return [
      'file' => 'Изображение'
    ];
  }

  public function getFiles()
  {

    return $this->hasMany(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'category']);
  }

  public function beforeSave($insert)
  {

    $files = new Files();

    if ($this->id && $_FILES && !empty($_FILES['Tree']['tmp_name']['file'])) {

      $path = \Yii::getAlias('@categoryImages') . '/' . $this->id;
      $path_to_save = '/images/categories/' . $this->id;
      $file_path = $_FILES['Tree']['tmp_name']['file'];

      $files->saveFiles([
        'replace' => true,
        'table_name' => 'category',
        'table_id' => $this->id,
        'file_path' => $file_path,
        'file_name' => ucfirst('Tree') . '[file]',
        'path' => $path,
        'path_to_save' => $path_to_save,
      ], ['width' => 200, 'height' => 200]);

    }

    return parent::beforeSave($insert);
  }

}
