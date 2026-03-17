<?php

use yii\db\Migration;

/**
 * Class m260317_093344_create_blocks_banners_carousel
 */
class m260317_093344_create_blocks_banners_carousel extends Migration
{
  public const TABLE_NAME = '{{%blocks_banners_carousel}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id' => $this->primaryKey(),
        'block_id' => $this->integer()->null()->comment('Блок'),
        'title' => $this->text()->null()->comment('Заголовок'),
        'title_color' => $this->string(255)->null()->comment('Цвет заголовка'),
        'announce' => $this->text()->null()->comment('Текст'),
        'announce_color' => $this->string(255)->null()->comment('Цвет текст'),
        'sequence' => $this->integer()->null()->comment('Последовательность баннеров'),
        'link' => $this->text()->notNull()->comment('Ссылка'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1)
      ],
      $tableOptions
    );

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
