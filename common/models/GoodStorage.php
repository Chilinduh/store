<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good_storage".
 *
 * @property int $id
 * @property string|null $code Код товара
 * @property string|null $name Название товара
 * @property string|null $created_at Дата создания
 */
class GoodStorage extends \yii\db\ActiveRecord
{

  public $file = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_storage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'file'], 'safe'],
            [['code', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Штрих-код',
            'name' => 'Name',
            'file' => 'Загрузить файл',
            'created_at' => 'Created At',
        ];
    }
}
