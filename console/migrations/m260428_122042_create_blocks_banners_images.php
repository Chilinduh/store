<?php

use yii\db\Migration;

/**
 * Class m260428_122042_create_blocks_banners_images
 */
class m260428_122042_create_blocks_banners_images extends Migration
{
  public const TABLE_NAME = '{{%blocks_banners_images}}';

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

    $this->getDb()->createCommand('ALTER SEQUENCE blocks_banners_images_id_seq RESTART WITH 1')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
