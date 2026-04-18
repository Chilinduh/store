<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Brands extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    public $file;

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
            [['show_in_blocks', 'url'], 'safe'],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png'],
            ['name', 'unique', 'targetAttribute' => ['name', 'external']]
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Название',
            'show' => 'Показать/скрыть',
            'file' => 'Изображение',
            'show_in_blocks' => 'Показывать в блоке брендов',
            'url' => 'Куд будет переход при клике',
        ];
    }

  public function getFiles()
  {

    return $this->hasMany(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'brands'])->orderBy('main DESC');
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
