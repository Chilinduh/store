<?php

namespace common\models;

use common\models\Blocks;
use Yii;

/**
 * This is the model class for table "blocks_banners".
 *
 * @property int $id
 * @property int|null $block_id Блок
 * @property string|null $title Заголовок
 * @property string|null $title_color Цвет заголовка
 * @property string|null $announce Текст
 * @property string|null $announce_color Цвет текст
 * @property string $link Ссылка
 */
class BlocksBanners extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blocks_banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_id'], 'default', 'value' => null],
            [['block_id'], 'integer'],
            [['link'], 'required'],
            [['link'], 'string'],
            [['title', 'title_color', 'announce', 'announce_color', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_id' => 'Блок',
            'title' => 'Заголовок',
            'title_color' => 'Цвет щаголовка',
            'announce' => 'Анонс банера',
            'announce_color' => 'Цвет анонса',
            'link' => 'Ссылка',
            'file' => 'Баннер (ширина 660px высота 210px)',
        ];
    }

  public function getBlock()
  {
    return $this->hasOne(Blocks::class, ['id' => 'block_id']);
  }
}
