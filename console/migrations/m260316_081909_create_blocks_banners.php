<?php

use yii\db\Migration;

/**
 * Class m260316_081909_create_blocks_banners
 */
class m260316_081909_create_blocks_banners extends Migration
{

  public const TABLE_NAME = '{{%blocks_banners}}';

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
        'link' => $this->text()->notNull()->comment('Ссылка'),
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
