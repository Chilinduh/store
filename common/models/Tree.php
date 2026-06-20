<?php

namespace common\models;

use common\models\Files;
use common\models\CategoryKeywords;
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
  public $meta_tag_title = null;
  public $meta_tag_keywords = null;
  public $meta_tag_description = null;
  

  public static function tableName()
  {
    return 'category';
  }

  public function rules() {

    $rules = parent::rules();

    $rules[] = [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'];
    $rules[] = [['meta_tag_title', 'meta_tag_keywords', 'meta_tag_description', 'created_at'], 'safe'];

    

    return $rules;
  }

  public function attributeLabels() {

    return [
      'file' => 'Изображение',      
      'meta_tag_title' => 'Заголовок (title)',
      'meta_tag_keywords' => 'Ключевые слова (keywords)',
      'meta_tag_description' => 'Описание (description)',
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

    $categoryKeywords = new CategoryKeywords();

    if($categoryKeywords = CategoryKeywords::find()->where(['category_id' => $this->id])->one()) {

      $categoryKeywords->meta_tag_title = $this->meta_tag_title;
      $categoryKeywords->meta_tag_keywords = $this->meta_tag_keywords;
      $categoryKeywords->meta_tag_description = $this->meta_tag_description;
      
    } else {

      $categoryKeywords = new CategoryKeywords([
        'category_id' => $this->id,
        'meta_tag_title' => $this->meta_tag_title,
        'meta_tag_keywords' => $this->meta_tag_keywords,
        'meta_tag_description' => $this->meta_tag_description,
      ]);
    }

    $categoryKeywords->save();

    return parent::beforeSave($insert);
  }

}
