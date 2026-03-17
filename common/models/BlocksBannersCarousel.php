<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blocks_banners_carousel".
 *
 * @property int $id
 * @property int|null $block_id Блок
 * @property string|null $title Заголовок
 * @property string|null $title_color Цвет заголовка
 * @property string|null $announce Текст
 * @property string|null $announce_color Цвет текст
 * @property int|null $sequence Последовательность баннеров
 * @property string $link Ссылка
 * @property int|null $show Показать/скрыть
 */
class BlocksBannersCarousel extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blocks_banners_carousel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_id', 'sequence', 'show'], 'default', 'value' => null],
            [['block_id', 'sequence', 'show'], 'integer'],
            [['title', 'announce', 'link'], 'string'],
            [['link'], 'required'],
            [['title_color', 'announce_color', 'file'], 'string', 'max' => 255],
            [['file'], 'safe'],
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
            'title_color' => 'Цвет заголовка',
            'announce' => 'Анонс банера',
            'announce_color' => 'Цвет анонса',
            'link' => 'Ссылка',
            'show' => 'Show',
            'sequence' => 'Позиция в карусели',
            'file' => 'Файл баннера (ширина 1350px высота 320px)',
        ];
    }

    public function getFiles()
    {

      return $this->hasOne(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'blocks_banners_carousel']);
    }
}
