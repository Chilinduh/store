<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use common\models\Files;


class Category extends ActiveRecord
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 9;
  const STATUS_ACTIVE = 1;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%category}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name'], 'string'],
      [['show', 'parent_id'], 'integer'],
//            [['name'], 'required'],
      //['name', 'unique', 'targetAttribute' => ['name', 'external']]
    ];
  }


  public function attributeLabels()
  {
    return [
      'name' => 'Название',
      'show' => 'Показать/скрыть',
    ];
  }


  public static function Category(array $params = null): array
  {

    $category = static::find()->where(['show' => self::STATUS_ACTIVE]);
    if($params) {

      $category->andWhere($params);
    }

    return $category->asArray()->all();
  }

  public static function CategoryList(array $params = null): array
  {

    $category = self::Category($params);
    return ArrayHelper::map($category, 'id', 'name');
  }

  public function getImage()
  {

    return $this->hasOne(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'category']);
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {

      $this->parent_id = $this->parent_id == NULL ? 0 : $this->parent_id;
      return true;
    }
    return false;

  }

}
